<?php

namespace App\Http\Controllers\Web\Backend\Bookings;

use App\Models\Villa;
use App\Models\Booking;
use App\Helpers\Helper;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Yajra\DataTables\DataTables;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Validator;

class AdminBookingsController extends Controller
{
    /**
     * Display a listing of dynamic page content.
     *
     * @param Request $request
     * @return View|JsonResponse
     * @throws Exception
     */
    public function index(Request $request): View | JsonResponse
    {
        if ($request->ajax()) {
            $data = Booking::with(['user', 'villa'])->latest()->get();
            return DataTables::of($data)
                ->addIndexColumn()

                ->addColumn('booking_id', function ($data) {
                    return $data->booking_id ? '#' . $data->booking_id : '';
                })

                ->addColumn('name', function ($data) {
                    return $data->user ? $data->user->name : '';
                })
                ->addColumn('image', function ($data) {
                    $img = '';
                    if ($data->villa && $data->villa->villa_images->first()) {
                        $img = '<img src="' . asset($data->villa->villa_images->first()->image) . '" alt="' . $data->villa->title . '" style="width: auto; height: 50px;" />';
                    }
                    return $img;
                })
                ->addColumn('villa', function ($data) {
                    return $data->villa ? $data->villa->title : '';
                })
                ->addColumn('villa_day_price', function ($data) {
                    return '₪' . ($data->villa_day_price ? $data->villa_day_price : 0);
                })
                ->addColumn('tax', function ($data) {
                    return '₪' . ($data->tax ? $data->tax : '');
                })
                ->addColumn('total_price', function ($data) {
                    return '₪' . ($data->total_amount ? $data->total_amount : '');
                })

                ->addColumn('payment_status', function ($data) {
                    return $data->payment_status ? $data->payment_status : '';
                })
                ->addColumn('check_in', function ($data) {
                    return date('M d, Y', strtotime($data->check_in_date));
                })
                ->addColumn('check_out', function ($data) {
                    return date('M d, Y', strtotime($data->check_out_date));
                })
                ->addColumn('status', function ($data) {
                    $statusOptions = [
                        'pending' => 'Pending',
                        'approved' => 'Completed',
                        'cancelled' => 'Cancelled',
                    ];

                    $status = '<select class="form-select status-dropdown"
                                       data-id="' . $data->id . '"
                                       onchange="showStatusChangeAlert(' . $data->id . ', this.value)"
                                       style="margin-left: 40px; width: 150px;">';

                    foreach ($statusOptions as $key => $value) {
                        $selected = $data->status == $key ? 'selected' : '';
                        $status .= '<option value="' . $key . '" ' . $selected . '>' . $value . '</option>';
                    }

                    $status .= '</select>';

                    return $status;
                })


                ->addColumn('action', function ($data) {
                    return '<div class="btn-group btn-group-sm" role="group" aria-label="Basic example">
                                <a href="' . route('bookings.show', $data->id) . '" type="button" class="btn btn-primary fs-14 text-white edit-icn" title="Edit">
                                    <i class="fe fe-eye"></i>
                                </a>
                                <a href="#" type="button" onclick="showDeleteConfirm(' . $data->id . ')" class="btn btn-danger fs-14 text-white delete-icn" title="Delete">
                                    <i class="fe fe-trash"></i>
                                </a>
                            </div>';
                })

                ->rawColumns(['booking_id', 'name', 'image','villa','villa_day_price','tax','total_price','payment_status','check_in','check_out','status','action'])
                ->make();
        }
        return view('backend.layouts.bookings.index');
    }

    // Show the form for editing a booking
    public function show($id)
    {
        $data = Booking::with('villa','villa.villa_images', 'user')->where('id', $id)->firstOrFail(); // Find the booking by id
        return view('backend.layouts.bookings.detail', compact('data'));
    }

    /**
     * Change the status of the specified dynamic page content.
     *
     * @param int $id
     * @return JsonResponse
     */
    public function changeStatus(Request $request, $id)
    {
        $status = $request->input('status');

        // Validate the status
        if (!in_array($status, ['pending', 'approved', 'cancelled'])) {
            return response()->json(['success' => false, 'message' => 'Invalid status']);
        }

        // Update the status in the database
        $booking = Booking::find($id);
        if ($booking) {

            // Get the booking user
            $user = $booking->user;
            if (!$user) {
                return response()->json(['success' => false, 'message' => __('User not found!')], 404);
            }

            // Get loyalty points from the booking
            $booking_loyalty_point_earn = $booking->loyalty_point_earn ?? 0;
            $booking_loyalty_point_use = $booking->loyalty_point_use ?? 0;

            if ($request->status == 'pending') {
                if ($booking->status == 'cancelled') {
                    if ($booking_loyalty_point_use > 0) {
                        $user->loyalty_point = max(0, ($user->loyalty_point ?? 0) - $booking_loyalty_point_use);
                    }
                    if ($booking_loyalty_point_earn > 0) {
                        $user->loyalty_point = $user->loyalty_point ?? 0;
                    }
                }elseif ($booking->status == 'approved') {
                    if ($booking_loyalty_point_use > 0) {
                        $user->loyalty_point = $user->loyalty_point ?? 0;
                    }
                    if ($booking_loyalty_point_earn > 0) {
                        $user->loyalty_point = max(0, ($user->loyalty_point ?? 0) - $booking_loyalty_point_earn);
                    }
                }
            } elseif ($request->status == 'cancelled') {
                if ($booking->status == 'approved') {
                    if ($booking_loyalty_point_earn > 0) {
                        $user->loyalty_point = max(0, ($user->loyalty_point ?? 0) - $booking_loyalty_point_earn);
                    }
                    if ($booking_loyalty_point_use > 0) {
                        $user->loyalty_point = max(0, ($user->loyalty_point ?? 0) + $booking_loyalty_point_use);
                    }
                }elseif ($booking->status == 'pending') {
                    if ($booking_loyalty_point_earn > 0) {
                        $user->loyalty_point = $user->loyalty_point ?? 0;
                    }
                    if ($booking_loyalty_point_use > 0) {
                        $user->loyalty_point = max(0, ($user->loyalty_point ?? 0) + $booking_loyalty_point_use);
                    }
                }
            } elseif ($request->status == 'approved') {
                if ($booking->status == 'cancelled') {
                    if ($booking_loyalty_point_earn > 0) {
                        $user->loyalty_point = max(0, ($user->loyalty_point ?? 0) + $booking_loyalty_point_earn);
                    }
                    if ($booking_loyalty_point_use > 0) {
                        $user->loyalty_point = max(0, ($user->loyalty_point ?? 0) - $booking_loyalty_point_use);
                    }
                }elseif ($booking->status == 'pending') {
                    if ($booking_loyalty_point_earn > 0) {
                        $user->loyalty_point = max(0, ($user->loyalty_point ?? 0) + $booking_loyalty_point_earn);
                    }
                    if ($booking_loyalty_point_use > 0) {
                        $user->loyalty_point = $user->loyalty_point ?? 0;
                    }
                }
            }

            $user->save();

            $booking->status = $status;
            $booking->save();

            return response()->json(['success' => true, 'message' => 'Status updated successfully']);
        }

        return response()->json(['success' => false, 'message' => 'Record not found']);
    }

       /**
     * Remove the specified city content from storage.
     *
     * @param int $id
     * @return JsonResponse
     */
    public function destroy(int $id): JsonResponse {
        try {
            $data = Booking::findOrFail($id);

            if (!$data) {
                return response()->json([
                    'success' => false,
                    'message' => 'Booking data not found!.',
                ]);
            }

            // Get the booking user
            $user = $data->user;
            if (!$user) {
                return response()->json(['success' => false, 'message' => __('User not found!')], 404);
            }

            // Get loyalty points from the booking
            $booking_loyalty_point_earn = $data->loyalty_point_earn ?? 0;
            $booking_loyalty_point_use = $data->loyalty_point_use ?? 0;

            if ($data->status == 'pending') {
                if ($booking_loyalty_point_earn > 0) {
                    $user->loyalty_point = $user->loyalty_point ?? 0;
                }
                if ($booking_loyalty_point_use > 0) {
                    $user->loyalty_point = max(0, ($user->loyalty_point ?? 0) + $booking_loyalty_point_use);
                }
            } elseif ($data->status == 'cancelled') {
                $user->loyalty_point = $user->loyalty_point ?? 0;
            } elseif ($data->status == 'approved') {
                if ($booking_loyalty_point_earn > 0) {
                    $user->loyalty_point = max(0, ($user->loyalty_point ?? 0) - $booking_loyalty_point_earn);
                } else {
                    $user->loyalty_point = max(0, ($user->loyalty_point ?? 0) + $booking_loyalty_point_use);
                }
            }

            $user->save();


            $data->delete();

            return response()->json([
                'success' => true,
                'message' => 'Booking deleted successfully.',
            ]);
        } catch (\Exception) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to delete the Booking.',
            ]);
        }
    }
}

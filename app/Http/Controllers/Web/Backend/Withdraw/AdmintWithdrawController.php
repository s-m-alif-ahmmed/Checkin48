<?php

namespace App\Http\Controllers\Web\Backend\Withdraw;

use App\Helpers\Helper;
use App\Models\City;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use App\Models\WithdrawRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\View\View;
use Yajra\DataTables\DataTables;

class AdmintWithdrawController extends Controller
{
    /**
     * Display a listing of city content.
     *
     * @param Request $request
     * @return View|JsonResponse
     * @throws Exception
     */
    public function index(Request $request): View | JsonResponse
    {
        if ($request->ajax()) {
            $data = WithdrawRequest::with('user')->latest()->get();
            return DataTables::of($data)
                ->addIndexColumn()

                ->addColumn('created_at', function ($data) {
                    $created_at = $data->created_at->format('d M, Y, h:i a') ?? '';
                    return $created_at;
                })

                ->addColumn('name', function ($data) {
                    $title = $data->user->name ?? '';
                    return $title;
                })
                ->addColumn('phone', function ($data) {
                    return $data->user->number ?? 'N/A';
                })
                ->addColumn('email', function ($data) {
                    $email = $data->user->email ?? '';
                    return $email;
                })
                ->addColumn('amount', function ($data) {
                    $amount = '₪' . $data->amount ?? 0;
                    return $amount;
                })

                ->addColumn('status', function ($data) {
                    $statusOptions = [
                        'approved' => 'Approved',
                        'cancel' => 'Cancelled',
                        'pending' => 'Pending',
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
                ->rawColumns(['created_at', 'name','phone', 'email', 'amount', 'description', 'status'])
                ->make();
        }
        return view('backend.layouts.withdraw.index');
    }

    /**
     * Change the status of the specified city content.
     *
     * @param int $id
     * @return JsonResponse
     */
    public function changeStatus(Request $request, $id)
    {
        $status = $request->input('status');

        // Validate the status
        if (!in_array($status, ['approved', 'cancel', 'pending'])) {
            return response()->json(['success' => false, 'message' => 'Invalid status']);
        }

        // Update the status in the database
        $villa = WithdrawRequest::find($id);
        if ($villa) {
            $villa->status = $status;
            $villa->save();

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
    public function destroy(int $id): JsonResponse
    {
        try {
            $data = WithdrawRequest::findOrFail($id);
            $data->delete();

            return response()->json([
                'success' => true,
                'message' => 'Data deleted successfully.',
            ]);
        } catch (\Exception) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to delete the data.',
            ]);
        }
    }
}

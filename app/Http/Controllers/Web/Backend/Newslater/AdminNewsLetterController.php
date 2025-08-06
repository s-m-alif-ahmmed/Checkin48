<?php

namespace App\Http\Controllers\Web\Backend\Newslater;

use App\Helpers\Helper;
use App\Models\NewsLetter;
use Illuminate\Http\Request;
use App\Jobs\SendNewsletterEmail;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\Eloquent\SoftDeletes;

class AdminNewsLetterController extends Controller
{
    use SoftDeletes;

    /**
     * Display a listing of the resource.
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View | \Illuminate\Http\JsonResponse
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = NewsLetter::latest();
            return DataTables::of($data)
                ->addIndexColumn()

                ->addColumn('title', function ($data) {
                    return $data->title;
                })
                ->addColumn('file', function ($data) {
                    $defaultImage = asset('frontend/no-image.jpg');
                    if ($data->pdf) {
                        $url = $defaultImage;
                    } else {
                        $url = $defaultImage;
                    }
                    return '<img src="' . $url . '" alt="Image" width="50px" height="50px">';
                })
                ->addColumn('status', function ($data) {
                    $backgroundColor  = $data->status == "active" ? '#4CAF50' : '#ccc';
                    $sliderTranslateX = $data->status == "active" ? '26px' : '2px';
                    $sliderStyles     = "position: absolute; top: 2px; left: 2px; width: 20px; height: 20px; background-color: white; border-radius: 50%; transition: transform 0.3s ease; transform: translateX($sliderTranslateX);";

                    $status = '<div class="form-check form-switch" style="margin-left:40px; position: relative; width: 50px; height: 24px; background-color: ' . $backgroundColor . '; border-radius: 12px; transition: background-color 0.3s ease; cursor: pointer;">';
                    $status .= '<input onclick="showStatusChangeAlert(' . $data->id . ')" type="checkbox" class="form-check-input" id="customSwitch' . $data->id . '" getAreaid="' . $data->id . '" name="status" style="position: absolute; width: 100%; height: 100%; opacity: 0; z-index: 2; cursor: pointer;">';
                    $status .= '<span style="' . $sliderStyles . '"></span>';
                    $status .= '<label for="customSwitch' . $data->id . '" class="form-check-label" style="margin-left: 10px;"></label>';
                    $status .= '</div>';

                    return $status;
                })
                ->addColumn('action', function ($data) {
                    return '<div class="btn-group btn-group-sm" role="group" aria-label="Basic example">
                                <a href="' . route('news.letter.edit', ['id' => $data->id]) . '" type="button" class="btn btn-primary fs-14 text-white edit-icn" title="Edit">
                                    <i class="fe fe-edit"></i>
                                </a>

                                <a href="#" type="button" onclick="showDeleteConfirm(' . $data->id . ')" class="btn btn-danger fs-14 text-white delete-icn" title="Delete">
                                    <i class="fe fe-trash"></i>
                                </a>
                            </div>';
                })
                ->rawColumns(['file', 'title', 'status', 'action'])
                ->make(true);
        }
        return view('backend.layouts.news-letter.index');
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.layouts.news-letter.create');
    }


    public function store(Request $request)
{
    $validator = Validator::make($request->all(), [
        'title'     => 'nullable|string|unique:news_letters,title',
        'pdf'       => 'nullable|file|mimes:pdf|max:20480',
        'status'    => 'required|string|in:active,inactive',
    ]);

    if ($validator->fails()) {
        return redirect()->back()->withErrors($validator)->withInput();
    }

    // Store the PDF file
    $pdf = Helper::fileUpload($request->pdf, 'pdf', time() . '_' . $request->file('pdf')->getClientOriginalName());

    // Save Newsletter data
    $newsletter         = new NewsLetter();
    $newsletter->title  = $request->title;
    $newsletter->pdf    = $pdf;
    $newsletter->status = $request->status;
    $newsletter->save();

    // Dispatch Queue Job to send emails
    SendNewsletterEmail::dispatch($newsletter);

    return redirect()->route('news.letter.index')->with('t-success', 'News Letter created successfully and emails sent.');
}


public function edit(int $id)
{
    $newsletter = NewsLetter::findOrFail($id);

    return view('backend.layouts.news-letter.update', compact('newsletter'));
}

public function update(Request $request, int $id)
{
    $validator = Validator::make($request->all(), [
        'title'     => 'nullable|string|unique:news_letters,title,' . $id,
        'pdf'       => 'nullable|file|mimes:pdf|max:20480',
        'status'    => 'required|string|in:active,inactive',
    ]);

    if ($validator->fails()) {
        return redirect()->back()->withErrors($validator)->withInput();
    }

    $newsletter         = NewsLetter::findOrFail($id);

    if ($request->hasFile('pdf')) {
        // Delete the old file
        if ($newsletter->pdf && file_exists(public_path($newsletter->pdf))) {
            Helper::fileDelete($newsletter->pdf);
        }

        $pdf = Helper::fileUpload($request->pdf, 'pdf', time() . '_' . $request->file('pdf')->getClientOriginalName());
        $newsletter->pdf = $pdf;
    }

    $newsletter->title  = $request->title;
    $newsletter->status = $request->status;
    $newsletter->save();

    return redirect()->route('news.letter.index')->with('t-success', 'News Letter updated successfully.');
}




    /**
     * Change the status of the specified dynamic page content.
     *
     * @param int $id
     * @return JsonResponse
     */
    public function status(int $id): JsonResponse {
        $data = NewsLetter::findOrFail($id);
        if ($data->status == 'active') {
            $data->status = 'inactive';
            $data->save();

            return response()->json([
                'success' => false,
                'message' => 'Unpublished Successfully.',
                'data'    => $data,
            ]);
        } else {
            $data->status = 'active';
            $data->save();

            return response()->json([
                'success' => true,
                'message' => 'Published Successfully.',
                'data'    => $data,
            ]);
        }
    }

    /**
     * Remove the specified dynamic page content from storage.
     *
     * @param int $id
     * @return JsonResponse
     */
    public function destroy(int $id): JsonResponse {
        try {
            $data = NewsLetter::findOrFail($id);
            $data->delete();

            return response()->json([
                'success' => true,
                'message' => 'News Letter deleted successfully.',
            ]);
        } catch (\Exception) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to delete the News Letter.',
            ]);
        }
    }

}

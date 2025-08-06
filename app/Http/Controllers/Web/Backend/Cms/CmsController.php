<?php

namespace App\Http\Controllers\Web\Backend\Cms;

use App\Models\Cms;
use App\Models\FooterButton;
use Illuminate\Http\Request;
use App\Helpers\Helper;
use App\Http\Controllers\Controller;

class CmsController extends Controller
{
    // Footer Buttons start
    public function footerButton()
    {
        $data = FooterButton::find(1);

        if (!$data) {
            return redirect()->back()->with('t-error', 'Footer Buttons not found');
        }
        return view('backend.layouts.cms.footer-button.edit', compact('data'))->with('t-success', 'Footer Buttons loaded successfully');
    }

    public function footerButtonUpdate(Request $request)
    {
        // Validate the request
        $request->validate([
            'title' => 'nullable|array',
            'title.en' => 'nullable|required_with:title.ar|string|max:255',
            'title.ar' => 'nullable|required_with:title.en|string|max:255',

            'button_one' => 'nullable|array',
            'button_one.en' => 'nullable|required_with:button_one.ar|string|max:255',
            'button_one.ar' => 'nullable|required_with:button_one.en|string|max:255',

            'button_two' => 'nullable|array',
            'button_two.en' => 'nullable|required_with:button_two.ar|string|max:255',
            'button_two.ar' => 'nullable|required_with:button_two.en|string|max:255',

            'button_three' => 'nullable|array',
            'button_three.en' => 'nullable|required_with:button_three.ar|string|max:100',
            'button_three.ar' => 'nullable|required_with:button_three.en|string|max:100',

            'button_four' => 'nullable|array',
            'button_four.en' => 'nullable|required_with:button_four.ar|string|max:100',
            'button_four.ar' => 'nullable|required_with:button_four.en|string|max:100',

            'button_five' => 'nullable|array',
            'button_five.en' => 'nullable|required_with:button_five.ar|string|max:100',
            'button_five.ar' => 'nullable|required_with:button_five.en|string|max:100',

            'button_one_url' => 'nullable',
            'button_two_url' => 'nullable',
            'button_three_url' => 'nullable',
            'button_four_url' => 'nullable',
            'button_five_url' => 'nullable',
        ]);

        // Find the Cms record by ID
        $data = FooterButton::find(1);

        if (!$data) {
            return redirect()->back()->with('t-error', 'Footer Buttons not found');
        }

        // Update the CMS record
        $updated = $data->update([
            'title' => $request->title,
            'button_one' => $request->button_one,
            'button_two' => $request->button_two,
            'button_three' => $request->button_three,
            'button_four' => $request->button_four,
            'button_five' => $request->button_five,
            'button_one_url' => $request->button_one_url,
            'button_two_url' => $request->button_two_url,
            'button_three_url' => $request->button_three_url,
            'button_four_url' => $request->button_four_url,
            'button_five_url' => $request->button_five_url,
        ]);

        // Redirect with a success or error message
        return redirect()->route('cms.footer.button')->with(
            $updated ? 't-success' : 't-error',
            $updated ? 'Footer Buttons Updated Successfully' : 'Data update failed!'
        );
    }

   // Footer Buttons end

    // home page banner start
    public function homeBanner()
    {
        $heros = Cms::find(1);

        if (!$heros) {
            return redirect()->back()->with('t-error', 'Home Banner not found');
        }
        return view('backend.layouts.cms.home.edit', compact('heros'))->with('t-success', 'Home Banner loaded successfully');
    }

    public function homeBannerUpdate(Request $request)
    {
        // Validate the request
        $request->validate([
            'banner_title' => 'nullable|array',
            'banner_title.en' => 'nullable|required_with:banner_title.ar|string|max:255',  // If 'en' is filled, 'ar' must also be filled
            'banner_title.ar' => 'nullable|required_with:banner_title.en|string|max:255',  // If 'ar' is filled, 'en' must also be filled
            'banner_image' => 'nullable|image|mimes:jpeg,jpg,png,svg,webp|max:10240',
            'banner_image_mobile' => 'nullable|image|mimes:jpeg,jpg,png,svg,webp|max:10240',
            'page_title' => 'nullable|array',
            'page_title.en' => 'nullable|required_with:page_title.ar|string|max:255',  // If 'en' is filled, 'ar' must also be filled
            'page_title.ar' => 'nullable|required_with:page_title.en|string|max:255',  // If 'ar' is filled, 'en' must also be filled
            'button_title' => 'nullable|array',
            'button_title.en' => 'nullable|required_with:button_title.ar|string|max:100',
            'button_title.ar' => 'nullable|required_with:button_title.en|string|max:100',
            'button_url' => 'nullable',
            'page_image' => 'nullable|image|mimes:jpeg,jpg,png,svg,webp|max:10240',
            'status' => 'nullable|in:active,inactive',
        ]);

        // Find the Cms record by ID
        $heros = Cms::find(1);

        if (!$heros) {
            return redirect()->back()->with('t-error', 'Home Banner not found');
        }

        // Update the CMS record
        $updated = $heros->update([
            'banner_title' => $request->banner_title,
            'page_title' => $request->page_title,
            'button_title' => $request->button_title,
            'button_url' => $request->button_url,
            'status' => $request->status,
        ]);

        if ($request->hasFile('banner_image')) {
            // Delete the old image if it exists
            if ($heros->banner_image) {
                Helper::fileDelete($heros->banner_image);
            }
            $imagePath = Helper::fileUpload($request->file('banner_image'), 'CMS/Home', time() . '_' . $request->file('banner_image')->getClientOriginalName());
            if ($imagePath !== null) {
                $heros->banner_image = $imagePath;
                $updated = $heros->save();
            }
        }

        if ($request->hasFile('banner_image_mobile')) {
            // Delete the old image if it exists
            if ($heros->banner_image_mobile) {
                Helper::fileDelete($heros->banner_image_mobile);
            }
            $imagePathMobile = Helper::fileUpload($request->file('banner_image_mobile'), 'CMS/Home', time() . '_' . $request->file('banner_image_mobile')->getClientOriginalName());
            if ($imagePathMobile !== null) {
                $heros->banner_image_mobile = $imagePathMobile;
                $updated = $heros->save();
            }
        }

        if ($request->hasFile('page_image')) {
            // Delete the old image if it exists
            if ($heros->page_image) {
                Helper::fileDelete($heros->page_image);
            }
            $imagePath = Helper::fileUpload($request->file('page_image'), 'CMS/Home/Page', time() . '_' . $request->file('page_image')->getClientOriginalName());
            if ($imagePath !== null) {
                $heros->page_image = $imagePath;
                $updated = $heros->save();
            }
        }

        // Redirect with a success or error message
        return redirect()->route('cms.home.header')->with(
            $updated ? 't-success' : 't-error',
            $updated ? 'Home Data Updated Successfully' : 'Data update failed!'
        );
    }

   // home page banner end


   /* about us page banner start */



   public function aboutusBanner()
   {
       $heros = Cms::find(2);

       if (!$heros) {
           return redirect()->back()->with('t-error', 'About Us Banner not found');
       }
       return view('backend.layouts.cms.aboutus.edit', compact('heros'))->with('t-success', 'About Us loaded successfully');
   }

    public function aboutusBannerUpdate(Request $request)
    {
        // Validate the request
        $request->validate([
            'banner_title' => 'nullable|array',
            'banner_title.en' => 'nullable|required_with:banner_title.ar|string|max:255',  // If 'en' is filled, 'ar' must also be filled
            'banner_title.ar' => 'nullable|required_with:banner_title.en|string|max:255',  // If 'ar' is filled, 'en' must also be filled
            'banner_image' => 'nullable|image|mimes:jpeg,jpg,png,svg,webp|max:10240',
            'page_title' => 'nullable|array',
            'page_title.en' => 'nullable|required_with:page_title.ar|string|max:255',  // If 'en' is filled, 'ar' must also be filled
            'page_title.ar' => 'nullable|required_with:page_title.en|string|max:255',  // If 'ar' is filled, 'en' must also be filled
            'button_title' => 'nullable|array',
            'button_title.en' => 'nullable|required_with:button_title.ar|string|max:100',
            'button_title.ar' => 'nullable|required_with:button_title.en|string|max:100',
            'button_url' => 'nullable',
            'page_image' => 'nullable|image|mimes:jpeg,jpg,png,svg,webp|max:10240',
            'status' => 'nullable|in:active,inactive',
        ]);

        // Find the Cms record by ID
        $heros = Cms::find(2);

        if (!$heros) {
            return redirect()->back()->with('t-error', 'About Us not found');
        }

        // Update the CMS record
        $updated = $heros->update([
            'banner_title' => $request->banner_title ?? null,
            'page_title' => $request->page_title ?? null,
            'button_title' => $request->button_title,
            'button_url' => $request->button_url,
            'status' => $request->status,
        ]);

        // Handle file uploads for banner and page images
        if ($request->hasFile('banner_image')) {
            if ($heros->banner_image) {
                Helper::fileDelete($heros->banner_image);
            }
            $imagePath = Helper::fileUpload($request->file('banner_image'), 'CMS/Aboutus', time() . '_' . $request->file('banner_image')->getClientOriginalName());
            if ($imagePath !== null) {
                $heros->banner_image = $imagePath;
                $updated = $heros->save();
            }
        }

        if ($request->hasFile('page_image')) {
            if ($heros->page_image) {
                Helper::fileDelete($heros->page_image);
            }
            $imagePath = Helper::fileUpload($request->file('page_image'), 'CMS/Aboutus/Page', time() . '_' . $request->file('page_image')->getClientOriginalName());
            if ($imagePath !== null) {
                $heros->page_image = $imagePath;
                $updated = $heros->save();
            }
        }

        // Redirect with a success or error message
        return redirect()->route('cms.aboutus.header')->with(
            $updated ? 't-success' : 't-error',
            $updated ? 'About Us Updated Successfully' : 'Data update failed!'
        );
    }

    /* about us page banner end */


   /* Villa page banner start */
   public function villaBanner()
   {
       $heros = Cms::find(3);

       if (!$heros) {
           return redirect()->back()->with('t-error', 'Villa Banner not found');
       }
       return view('backend.layouts.cms.villa.edit', compact('heros'))->with('t-success', 'Villa loaded successfully');
   }

   public function villaBannerUpdate(Request $request)
   {
       // Validate the request
       $request->validate([
           'banner_title' => 'nullable|array',
           'banner_title.en' => 'nullable|required_with:banner_title.ar|string|max:255',  // If 'en' is filled, 'ar' must also be filled
           'banner_title.ar' => 'nullable|required_with:banner_title.en|string|max:255',  // If 'ar' is filled, 'en' must also be filled
           'banner_image' => 'nullable|image|mimes:jpeg,jpg,png,svg,webp|max:10240',
           'status' => 'nullable|in:active,inactive',
       ]);

       // Find the Cms record by ID
       $heros = Cms::find(3);

       if (!$heros) {
           return redirect()->back()->with('t-error', 'Villa Banner not found');
       }

       // Update the CMS record
       $updated = $heros->update([
           'banner_title' => $request->banner_title,
           'status' => $request->status,
       ]);

       if ($request->hasFile('banner_image')) {
           // Delete the old image if it exists
           if ($heros->banner_image) {
               Helper::fileDelete($heros->banner_image);
           }
           $imagePath = Helper::fileUpload($request->file('banner_image'), 'CMS/Villa', time() . '_' . $request->file('banner_image')->getClientOriginalName());
           if ($imagePath !== null) {
               $heros->banner_image = $imagePath;
               $updated = $heros->save();
           }
       }

       // Redirect with a success or error message
       return redirect()->route('cms.villa.header')->with(
           $updated ? 't-success' : 't-error',
           $updated ? 'Villa Updated Successfully' : 'Data update failed!'
       );
   }
   /* Villa page banner end */

   /* Villa Detail page banner start */
   public function villaDetailBanner()
   {
       $heros = Cms::find(7);

       if (!$heros) {
           return redirect()->back()->with('t-error', 'Villa Detail Banner not found');
       }
       return view('backend.layouts.cms.villa-detail.edit', compact('heros'))->with('t-success', 'Villa Detail loaded successfully');
   }

   public function villaDetailBannerUpdate(Request $request)
   {
       // Validate the request
       $request->validate([
           'banner_title' => 'nullable|array',
           'banner_title.en' => 'nullable|required_with:banner_title.ar|string|max:255',  // If 'en' is filled, 'ar' must also be filled
           'banner_title.ar' => 'nullable|required_with:banner_title.en|string|max:255',  // If 'ar' is filled, 'en' must also be filled
           'banner_image' => 'nullable|image|mimes:jpeg,jpg,png,svg,webp|max:10240',
           'page_title' => 'nullable|array',
           'page_title.en' => 'nullable|required_with:page_title.ar|string|max:255',  // If 'en' is filled, 'ar' must also be filled
           'page_title.ar' => 'nullable|required_with:page_title.en|string|max:255',  // If 'ar' is filled, 'en' must also be filled
           'button_title' => 'nullable|array',
           'button_title.en' => 'nullable|required_with:button_title.ar|string|max:100',
           'button_title.ar' => 'nullable|required_with:button_title.en|string|max:100',
           'button_url' => 'nullable',
           'page_image' => 'nullable|image|mimes:jpeg,jpg,png,svg,webp|max:10240',
           'status' => 'nullable|in:active,inactive',
       ]);

       // Find the Cms record by ID
       $heros = Cms::find(7);

       if (!$heros) {
           return redirect()->back()->with('t-error', 'loyalty Banner not found');
       }

       // Update the CMS record
       $updated = $heros->update([
           'banner_title' => $request->banner_title,
           'page_title' => $request->page_title,
           'button_title' => $request->button_title,
           'button_url' => $request->button_url,
           'status' => $request->status,
       ]);

       if ($request->hasFile('banner_image')) {
           // Delete the old image if it exists
           if ($heros->banner_image) {
               Helper::fileDelete($heros->banner_image);
           }
           $imagePath = Helper::fileUpload($request->file('banner_image'), 'CMS/Villa_Detail', time() . '_' . $request->file('banner_image')->getClientOriginalName());
           if ($imagePath !== null) {
               $heros->banner_image = $imagePath;
               $updated = $heros->save();
           }
       }

       if ($request->hasFile('page_image')) {
           // Delete the old image if it exists
           if ($heros->page_image) {
               Helper::fileDelete($heros->page_image);
           }
           $imagePath = Helper::fileUpload($request->file('page_image'), 'CMS/Villa_Detail/Page', time() . '_' . $request->file('page_image')->getClientOriginalName());
           if ($imagePath !== null) {
               $heros->page_image = $imagePath;
               $updated = $heros->save();
           }
       }

       // Redirect with a success or error message
       return redirect()->route('cms.villa-detail.header')->with(
           $updated ? 't-success' : 't-error',
           $updated ? 'Villa Detail Updated Successfully' : 'Data update failed!'
       );
   }
   /* Villa Detail page banner end */


   /* loyalty page banner start */
   public function loyaltyBanner()
   {
       $heros = Cms::find(4);

       if (!$heros) {
           return redirect()->back()->with('t-error', 'Loyalty Banner not found');
       }
       return view('backend.layouts.cms.loyalty.edit', compact('heros'))->with('t-success', 'Loyalty loaded successfully');
   }

   public function loyaltyBannerUpdate(Request $request)
   {
       // Validate the request
       $request->validate([
           'banner_title' => 'nullable|array',
           'banner_title.en' => 'nullable|required_with:banner_title.ar|string|max:255',  // If 'en' is filled, 'ar' must also be filled
           'banner_title.ar' => 'nullable|required_with:banner_title.en|string|max:255',  // If 'ar' is filled, 'en' must also be filled
           'sub_title' => 'nullable|array',
           'sub_title.en' => 'nullable|required_with:sub_title.ar|string|max:255',  // If 'en' is filled, 'ar' must also be filled
           'sub_title.ar' => 'nullable|required_with:sub_title.en|string|max:255',  // If 'ar' is filled, 'en' must also be filled
           'banner_image' => 'nullable|image|mimes:jpeg,jpg,png,svg,webp|max:10240',
           'page_title' => 'nullable|array',
           'page_title.en' => 'nullable|required_with:page_title.ar|string|max:255',  // If 'en' is filled, 'ar' must also be filled
           'page_title.ar' => 'nullable|required_with:page_title.en|string|max:255',  // If 'ar' is filled, 'en' must also be filled
           'button_title' => 'nullable|array',
           'button_title.en' => 'nullable|required_with:button_title.ar|string|max:100',
           'button_title.ar' => 'nullable|required_with:button_title.en|string|max:100',
           'button_url' => 'nullable',
           'page_image' => 'nullable|image|mimes:jpeg,jpg,png,svg,webp|max:10240',
           'status' => 'nullable|in:active,inactive',
       ]);

       // Find the Cms record by ID
       $heros = Cms::find(4);

       if (!$heros) {
           return redirect()->back()->with('t-error', 'loyalty Banner not found');
       }

       // Update the CMS record
       $updated = $heros->update([
           'banner_title' => $request->banner_title,
           'sub_title' => $request->sub_title,
           'page_title' => $request->page_title,
           'button_title' => $request->button_title,
           'button_url' => $request->button_url,
           'status' => $request->status,
       ]);

       if ($request->hasFile('banner_image')) {
           // Delete the old image if it exists
           if ($heros->banner_image) {
               Helper::fileDelete($heros->banner_image);
           }
           $imagePath = Helper::fileUpload($request->file('banner_image'), 'CMS/loyalty', time() . '_' . $request->file('banner_image')->getClientOriginalName());
           if ($imagePath !== null) {
               $heros->banner_image = $imagePath;
               $updated = $heros->save();
           }
       }

       if ($request->hasFile('page_image')) {
           // Delete the old image if it exists
           if ($heros->page_image) {
               Helper::fileDelete($heros->page_image);
           }
           $imagePath = Helper::fileUpload($request->file('page_image'), 'CMS/loyalty/Page', time() . '_' . $request->file('page_image')->getClientOriginalName());
           if ($imagePath !== null) {
               $heros->page_image = $imagePath;
               $updated = $heros->save();
           }
       }

       // Redirect with a success or error message
       return redirect()->route('cms.loyalty.header')->with(
           $updated ? 't-success' : 't-error',
           $updated ? 'loyalty Updated Successfully' : 'Data update failed!'
       );
   }
   /* loyalty page banner end */


   /* Blog page banner start */
   public function blogBanner()
   {
       $heros = Cms::find(5);

       if (!$heros) {
           return redirect()->back()->with('t-error', 'Blog Banner not found');
       }
       return view('backend.layouts.cms.blog.edit', compact('heros'))->with('t-success', 'Blog loaded successfully');
   }

   public function blogBannerUpdate(Request $request)
   {
       // Validate the request
       $request->validate([
           'banner_title' => 'nullable|array',
           'banner_title.en' => 'nullable|required_with:banner_title.ar|string|max:255',  // If 'en' is filled, 'ar' must also be filled
           'banner_title.ar' => 'nullable|required_with:banner_title.en|string|max:255',  // If 'ar' is filled, 'en' must also be filled
           'banner_image' => 'nullable|image|mimes:jpeg,jpg,png,svg,webp|max:10240',
           'page_title' => 'nullable|array',
           'page_title.en' => 'nullable|required_with:page_title.ar|string|max:255',  // If 'en' is filled, 'ar' must also be filled
           'page_title.ar' => 'nullable|required_with:page_title.en|string|max:255',  // If 'ar' is filled, 'en' must also be filled
           'button_title' => 'nullable|array',
           'button_title.en' => 'nullable|required_with:button_title.ar|string|max:100',
           'button_title.ar' => 'nullable|required_with:button_title.en|string|max:100',
           'button_url' => 'nullable',
           'page_image' => 'nullable|image|mimes:jpeg,jpg,png,svg,webp|max:10240',
           'status' => 'nullable|in:active,inactive',
       ]);

       // Find the Cms record by ID
       $heros = Cms::find(5);

       if (!$heros) {
           return redirect()->back()->with('t-error', 'Blog Banner not found');
       }

       // Update the CMS record
       $updated = $heros->update([
           'banner_title' => $request->banner_title,
           'page_title' => $request->page_title,
           'button_title' => $request->button_title,
           'button_url' => $request->button_url,
           'status' => $request->status,
       ]);

       if ($request->hasFile('banner_image')) {
           // Delete the old image if it exists
           if ($heros->banner_image) {
               Helper::fileDelete($heros->banner_image);
           }
           $imagePath = Helper::fileUpload($request->file('banner_image'), 'CMS/Blog', time() . '_' . $request->file('banner_image')->getClientOriginalName());
           if ($imagePath !== null) {
               $heros->banner_image = $imagePath;
               $updated = $heros->save();
           }
       }

       if ($request->hasFile('page_image')) {
           // Delete the old image if it exists
           if ($heros->page_image) {
               Helper::fileDelete($heros->page_image);
           }
           $imagePath = Helper::fileUpload($request->file('page_image'), 'CMS/Blog/Page', time() . '_' . $request->file('page_image')->getClientOriginalName());
           if ($imagePath !== null) {
               $heros->page_image = $imagePath;
               $updated = $heros->save();
           }
       }

       // Redirect with a success or error message
       return redirect()->route('cms.blog.header')->with(
           $updated ? 't-success' : 't-error',
           $updated ? 'Blog Updated Successfully' : 'Data update failed!'
       );
   }
   /* Blog page banner end */

   /* Blog Detail page banner start */
   public function blogDetailBanner()
   {
       $heros = Cms::find(8);

       if (!$heros) {
           return redirect()->back()->with('t-error', 'Blog Detail Banner not found');
       }
       return view('backend.layouts.cms.blog-detail.edit', compact('heros'))->with('t-success', 'Blog Detail loaded successfully');
   }

   public function blogDetailBannerUpdate(Request $request)
   {
       // Validate the request
       $request->validate([
           'banner_title' => 'nullable|array',
           'banner_title.en' => 'nullable|required_with:banner_title.ar|string|max:255',  // If 'en' is filled, 'ar' must also be filled
           'banner_title.ar' => 'nullable|required_with:banner_title.en|string|max:255',  // If 'ar' is filled, 'en' must also be filled
           'banner_image' => 'nullable|image|mimes:jpeg,jpg,png,svg,webp|max:10240',
           'page_title' => 'nullable|array',
           'page_title.en' => 'nullable|required_with:page_title.ar|string|max:255',  // If 'en' is filled, 'ar' must also be filled
           'page_title.ar' => 'nullable|required_with:page_title.en|string|max:255',  // If 'ar' is filled, 'en' must also be filled
           'button_title' => 'nullable|array',
           'button_title.en' => 'nullable|required_with:button_title.ar|string|max:100',
           'button_title.ar' => 'nullable|required_with:button_title.en|string|max:100',
           'button_url' => 'nullable',
           'page_image' => 'nullable|image|mimes:jpeg,jpg,png,svg,webp|max:10240',
           'status' => 'nullable|in:active,inactive',
       ]);

       // Find the Cms record by ID
       $heros = Cms::find(8);

       if (!$heros) {
           return redirect()->back()->with('t-error', 'Blog Banner not found');
       }

       // Update the CMS record
       $updated = $heros->update([
           'banner_title' => $request->banner_title,
           'page_title' => $request->page_title,
           'button_title' => $request->button_title,
           'button_url' => $request->button_url,
           'status' => $request->status,
       ]);

       if ($request->hasFile('banner_image')) {
           // Delete the old image if it exists
           if ($heros->banner_image) {
               Helper::fileDelete($heros->banner_image);
           }
           $imagePath = Helper::fileUpload($request->file('banner_image'), 'CMS/Blog_Detail', time() . '_' . $request->file('banner_image')->getClientOriginalName());
           if ($imagePath !== null) {
               $heros->banner_image = $imagePath;
               $updated = $heros->save();
           }
       }

       if ($request->hasFile('page_image')) {
           // Delete the old image if it exists
           if ($heros->page_image) {
               Helper::fileDelete($heros->page_image);
           }
           $imagePath = Helper::fileUpload($request->file('page_image'), 'CMS/Blog_Detail/Page', time() . '_' . $request->file('page_image')->getClientOriginalName());
           if ($imagePath !== null) {
               $heros->page_image = $imagePath;
               $updated = $heros->save();
           }
       }

       // Redirect with a success or error message
       return redirect()->route('cms.blog-detail.header')->with(
           $updated ? 't-success' : 't-error',
           $updated ? 'Blog Detail Updated Successfully' : 'Data update failed!'
       );
   }
   /* Blog Detail page banner end */


   /* contact page banner start */
   public function contactBanner()
   {
       $heros = Cms::find(6);

       if (!$heros) {
           return redirect()->back()->with('t-error', 'Contact Banner not found');
       }
       return view('backend.layouts.cms.contact.edit', compact('heros'))->with('t-success', 'Contact loaded successfully');
   }

   public function contactBannerUpdate(Request $request)
   {
       // Validate the request
       $request->validate([
           'banner_title' => 'nullable|array',
           'banner_title.en' => 'nullable|required_with:banner_title.ar|string|max:255',  // If 'en' is filled, 'ar' must also be filled
           'banner_title.ar' => 'nullable|required_with:banner_title.en|string|max:255',  // If 'ar' is filled, 'en' must also be filled
           'banner_image' => 'nullable|image|mimes:jpeg,jpg,png,svg,webp|max:10240',
           'page_title' => 'nullable|array',
           'page_title.en' => 'nullable|required_with:page_title.ar|string|max:255',  // If 'en' is filled, 'ar' must also be filled
           'page_title.ar' => 'nullable|required_with:page_title.en|string|max:255',  // If 'ar' is filled, 'en' must also be filled
           'button_title' => 'nullable|array',
           'button_title.en' => 'nullable|required_with:button_title.ar|string|max:100',
           'button_title.ar' => 'nullable|required_with:button_title.en|string|max:100',
           'button_url' => 'nullable',
           'page_image' => 'nullable|image|mimes:jpeg,jpg,png,svg,webp|max:10240',
           'image' => 'nullable|image|mimes:jpeg,jpg,png,svg,webp|max:10240',
           'status' => 'nullable|in:active,inactive',
       ]);

       // Find the Cms record by ID
       $heros = Cms::find(6);

       if (!$heros) {
           return redirect()->back()->with('t-error', 'Contact Banner not found');
       }

       // Update the CMS record
       $updated = $heros->update([
           'banner_title' => $request->banner_title,
           'page_title' => $request->page_title,
           'button_title' => $request->button_title,
           'button_url' => $request->button_url,
           'status' => $request->status,
       ]);

       if ($request->hasFile('banner_image')) {
           // Delete the old image if it exists
           if ($heros->banner_image) {
               Helper::fileDelete($heros->banner_image);
           }
           $imagePath = Helper::fileUpload($request->file('banner_image'), 'CMS/Contact', time() . '_' . $request->file('banner_image')->getClientOriginalName());
           if ($imagePath !== null) {
               $heros->banner_image = $imagePath;
               $updated = $heros->save();
           }
       }

       if ($request->hasFile('page_image')) {
           // Delete the old image if it exists
           if ($heros->page_image) {
               Helper::fileDelete($heros->page_image);
           }
           $imagePath = Helper::fileUpload($request->file('page_image'), 'CMS/Contact/Page', time() . '_' . $request->file('page_image')->getClientOriginalName());
           if ($imagePath !== null) {
               $heros->page_image = $imagePath;
               $updated = $heros->save();
           }
       }
       if ($request->hasFile('image')) {
           // Delete the old image if it exists
           if ($heros->image) {
               Helper::fileDelete($heros->image);
           }
           $imagePath = Helper::fileUpload($request->file('image'), 'CMS/Contact/Page', time() . '_' . $request->file('image')->getClientOriginalName());
           if ($imagePath !== null) {
               $heros->image = $imagePath;
               $updated = $heros->save();
           }
       }

       // Redirect with a success or error message
       return redirect()->route('cms.contact.header')->with(
           $updated ? 't-success' : 't-error',
           $updated ? 'Contact Updated Successfully' : 'Data update failed!'
       );
   }
   /* contact page banner end */



   /* All Villa page banner start */
   public function allVillaBanner()
   {
       $heros = Cms::find(9);

       if (!$heros) {
           return redirect()->back()->with('t-error', 'All villa Banner not found');
       }

       return view('backend.layouts.cms.all-vila.edit', compact('heros'))->with('t-success', 'All Vila loaded successfully');
   }

   public function allVillaBannerUpdate(Request $request)
   {
       // Validate the request
       $request->validate([
           'banner_title' => 'nullable|array',
           'banner_title.en' => 'nullable|required_with:banner_title.ar|string|max:255',  // If 'en' is filled, 'ar' must also be filled
           'banner_title.ar' => 'nullable|required_with:banner_title.en|string|max:255',  // If 'ar' is filled, 'en' must also be filled
           'banner_image' => 'nullable|image|mimes:jpeg,jpg,png,svg,webp|max:10240',
           'page_title' => 'nullable|array',
           'page_title.en' => 'nullable|required_with:page_title.ar|string|max:255',  // If 'en' is filled, 'ar' must also be filled
           'page_title.ar' => 'nullable|required_with:page_title.en|string|max:255',  // If 'ar' is filled, 'en' must also be filled
           'button_title' => 'nullable|array',
           'button_title.en' => 'nullable|required_with:button_title.ar|string|max:100',
           'button_title.ar' => 'nullable|required_with:button_title.en|string|max:100',
           'button_url' => 'nullable',
           'page_image' => 'nullable|image|mimes:jpeg,jpg,png,svg,webp|max:10240',
           'status' => 'nullable|in:active,inactive',
       ]);

       // Find the Cms record by ID
       $heros = Cms::find(9);

       if (!$heros) {
           return redirect()->back()->with('t-error', 'All villa Banner not found');
       }

       // Update the CMS record
       $updated = $heros->update([
           'banner_title' => $request->banner_title,
           'page_title' => $request->page_title,
           'button_title' => $request->button_title,
           'button_url' => $request->button_url,
           'status' => $request->status,
       ]);

       if ($request->hasFile('banner_image')) {
           // Delete the old image if it exists
           if ($heros->banner_image) {
               Helper::fileDelete($heros->banner_image);
           }
           $imagePath = Helper::fileUpload($request->file('banner_image'), 'CMS/All-villa', time() . '_' . $request->file('banner_image')->getClientOriginalName());
           if ($imagePath !== null) {
               $heros->banner_image = $imagePath;
               $updated = $heros->save();
           }
       }

       if ($request->hasFile('page_image')) {
           // Delete the old image if it exists
           if ($heros->page_image) {
               Helper::fileDelete($heros->page_image);
           }
           $imagePath = Helper::fileUpload($request->file('page_image'), 'CMS/All-villa/Page', time() . '_' . $request->file('page_image')->getClientOriginalName());
           if ($imagePath !== null) {
               $heros->page_image = $imagePath;
               $updated = $heros->save();
           }
       }

       // Redirect with a success or error message
       return redirect()->route('cms.all.villa.header')->with(
           $updated ? 't-success' : 't-error',
           $updated ? 'All Villa Updated Successfully' : 'Data update failed!'
       );
   }
   /* All Villa page banner end */



     /* checkout page banner start */
     public function checkoutBanner()
     {
         $heros = Cms::find(10);

         if (!$heros) {
             return redirect()->back()->with('t-error', 'Checkout Banner not found');
         }
         return view('backend.layouts.cms.checkout.edit', compact('heros'))->with('t-success', 'Checkout loaded successfully');
     }

     public function checkoutBannerUpdate(Request $request)
     {
         // Validate the request
         $request->validate([
             'banner_title' => 'nullable|array',
             'banner_title.en' => 'nullable|required_with:banner_title.ar|string|max:255',  // If 'en' is filled, 'ar' must also be filled
             'banner_title.ar' => 'nullable|required_with:banner_title.en|string|max:255',  // If 'ar' is filled, 'en' must also be filled
             'banner_image' => 'nullable|image|mimes:jpeg,jpg,png,svg,webp|max:10240',
             'status' => 'nullable|in:active,inactive',
         ]);

         // Find the Cms record by ID
         $heros = Cms::find(10);

         if (!$heros) {
             return redirect()->back()->with('t-error', 'Checkout Banner not found');
         }

         // Update the CMS record
         $updated = $heros->update([
             'banner_title' => $request->banner_title,
             'status' => $request->status,
         ]);

         if ($request->hasFile('banner_image')) {
             // Delete the old image if it exists
             if ($heros->banner_image) {
                 Helper::fileDelete($heros->banner_image);
             }
             $imagePath = Helper::fileUpload($request->file('banner_image'), 'CMS/Checkout', time() . '_' . $request->file('banner_image')->getClientOriginalName());
             if ($imagePath !== null) {
                 $heros->banner_image = $imagePath;
                 $updated = $heros->save();
             }
         }

         // Redirect with a success or error message
         return redirect()->route('cms.checkout.header')->with(
             $updated ? 't-success' : 't-error',
             $updated ? 'Checkout Updated Successfully' : 'Data update failed!'
         );
     }
     /* checkout page banner end */


     /* search page banner start */
     public function searchBanner()
     {
         $heros = Cms::find(11);

         if (!$heros) {
             return redirect()->back()->with('t-error', 'Search Banner not found');
         }
         return view('backend.layouts.cms.search.edit', compact('heros'))->with('t-success', 'Search loaded successfully');
     }

     public function searchBannerUpdate(Request $request)
     {
         // Validate the request
         $request->validate([
             'banner_image' => 'nullable|image|mimes:jpeg,jpg,png,svg,webp|max:10240',
             'status' => 'nullable|in:active,inactive',
         ]);

         // Find the Cms record by ID
         $heros = Cms::find(11);

         if (!$heros) {
             return redirect()->back()->with('t-error', 'Search Banner not found');
         }

         // Update the CMS record
         $updated = $heros->update([
             'status' => $request->status,
         ]);

         if ($request->hasFile('banner_image')) {
             // Delete the old image if it exists
             if ($heros->banner_image) {
                 Helper::fileDelete($heros->banner_image);
             }
             $imagePath = Helper::fileUpload($request->file('banner_image'), 'CMS/Search', time() . '_' . $request->file('banner_image')->getClientOriginalName());
             if ($imagePath !== null) {
                 $heros->banner_image = $imagePath;
                 $updated = $heros->save();
             }
         }

         // Redirect with a success or error message
         return redirect()->route('cms.search.header')->with(
             $updated ? 't-success' : 't-error',
             $updated ? 'Search Updated Successfully' : 'Data update failed!'
         );
     }
     /* search page banner end */
}

<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Games_model;
use App\Models\Levels_model;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class Games extends Controller
{
    public function index()
    {
        has_access(17);
        $this->data['rows'] = Games_model::orderBy('id', 'ASC')->get();
        return view('admin.games.index', $this->data);
    }


    public function levels($id)
    {

        $this->data['rows'] = Levels_model::where('game_id', $id)->get();

         return view('admin.games.levels', $this->data);
    }
    public function add(Request $request)
    {
        has_access(17);
        $input = $request->all();
        if ($input) {
            $data = array();
            if ($request->hasFile('image')) {

                $request->validate([
                    'image' => 'mimes:png,jpg,jpeg,svg,gif|max:40000'
                ]);
                $image = $request->file('image')->store('public/games/');
                if (!empty(basename($image))) {
                    generateThumbnail('games', basename($image), 'square', 'large');
                    $data['image'] = basename($image);
                }
            }
            if (!empty($input['status'])) {
                $data['status'] = 1;
            } else {
                $data['status'] = 0;
            }

            if (!empty($input['featured'])) {
                $data['is_featured'] = 1;
            } else {
                $data['is_featured'] = 0;
            }

            $data['meta_title'] = $input['meta_title'];
            $data['meta_description'] = $input['meta_description'];
            $data['meta_keywords'] = $input['meta_keywords'];
            $data['title'] = $input['title'];
            $data['slug'] = checkSlug(Str::slug($data['title'], '-'), 'Games');
            $data['detail'] = $input['detail'];
     

            $id = Games_model::create($data);
            return redirect('admin/games/')
                ->with('success', 'Content Updated Successfully');
        }
        $this->data['enable_editor'] = true;
        return view('admin.games.index', $this->data);
    }


    public function level_add(Request $request , $id)
    {
        has_access(17); 
        $input = $request->all();
    
        if ($input) {
            $data = [];
    
           
    
            $data['status'] = !empty($input['status']) ? 1 : 0;
    
          
    
            $data['meta_title'] = $input['meta_title'];
            $data['meta_description'] = $input['meta_description'];
            $data['meta_keywords'] = $input['meta_keywords'];
            $data['name'] = $input['name'];
            $data['slug'] = checkSlug(Str::slug($data['name'], '-'), 'Levels');
            $data['price'] = $input['price'];
    
            if (!empty($id)) {
                $data['game_id'] = $id; 
            } else {
                return redirect()->back()->with('error', 'Game ID is required.');
            }
    
         
            Levels_model::create($data);
    
            return redirect('admin/games/levels/' . $id)
                ->with('success', 'Level Added Successfully');
        }
    
        $this->data['enable_editor'] = true;
        return view('admin.games.levels', $this->data);
    }
    public function edit(Request $request, $id)
    {
        has_access(17);
        $Games = Games_model::find($id);
        $input = $request->all();
        if ($input) {
            $data = array();
            if ($request->hasFile('image')) {

                $request->validate([
                    'image' => 'mimes:png,jpg,jpeg,svg,gif|max:40000'
                ]);
                $image = $request->file('image')->store('public/games/');
                if (!empty($image)) {
                    removeImage("games/" . $Games->image);
                    generateThumbnail('Games', basename($image), 'square', 'large');
                    $Games->image = basename($image);
                }
            }
            if (!empty($input['status'])) {
                $Games->status = 1;
            } else {
                $Games->status = 0;
            }

            if (!empty($input['featured'])) {
                $data['is_featured'] = 1;
            } else {
                $data['is_featured'] = 0;
            }

            $Games->meta_title = $input['meta_title'];
            $Games->meta_description = $input['meta_description'];
            $Games->meta_keywords = $input['meta_keywords'];
            // $Games->tags=$input['tags'];
            $Games->title = $input['title'];
            $Games->slug = checkSlug(Str::slug($Games->title, '-'), 'Games', $Games->id);
            $Games->detail = $input['detail'];
            // pr($Games->category);
            

            // pr($input['category']);
            $Games->update();
            return redirect('admin/games/edit/' . $request->segment(4))
                ->with('success', 'Content Updated Successfully');
        }
        $this->data['row'] = Games_model::find($id);
        $this->data['enable_editor'] = true;
        // $this->data['categories'] = Games_categories_model::where('status', 1)->get();

        return view('admin.games.index', $this->data);
    }


    public function level_edit(Request $request, $id)
    {
        has_access(17);
        $Games = Levels_model::find($id);
        $input = $request->all();
        if ($input) {
            $data = array();
           
            if (!empty($input['status'])) {
                $Games->status = 1;
            } else {
                $Games->status = 0;
            }

           

            $Games->meta_title = $input['meta_title'];
            $Games->meta_description = $input['meta_description'];
            $Games->meta_keywords = $input['meta_keywords'];
            $Games->name = $input['name'];
            $Games->slug = checkSlug(Str::slug($Games->name, '-'), 'Games', $Games->id);
            $Games->price = $input['price'];
            

            $Games->update();
            return redirect('admin/games/levels/edit/' . $request->segment(5))
                ->with('success', 'Content Updated Successfully');
        }
        $this->data['row'] = Levels_model::find($id);
        $this->data['enable_editor'] = true;

        return view('admin.games.levels', $this->data);
    }

    public function orderAll(Request $request)
    {
        $rows = Games_model::all();
        foreach ($rows as $row) {
            $orderId = $request->input('orderid' . $row->id);
            $type = $request->input('type' . $row->id);
            if ($orderId !== null) {
                $row->order_no = $orderId;
                $row->save();
            }
        }

        return redirect('admin/games/' . $type)
            ->with('success', 'Order updated Successfully');
    }

    public function delete($id)
    {
        has_access(17);
        $Games = Games_model::find($id);
        removeImage("games/" . $Games->image);
        $Games->delete();
        return redirect('admin/games/')
            ->with('error', 'Content deleted Successfully');
    }



    
    public function level_delete($id)
    {
        has_access(17);
        $levels = Levels_model::find($id);

        $game_id = $levels->game_id;
        $levels->delete();
        return redirect('admin/games/levels/' . $game_id)
            ->with('error', 'Content deleted Successfully');
    }
}

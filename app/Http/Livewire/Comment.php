<?php

namespace App\Http\Livewire;

use App\Comment as ModelComment;
use Livewire\Component;

class Comment extends Component
{
    public $newCommnet;
    public $comments = [];
    // public $comments = [
    //     [
    //         'body' => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Et harum cum nam, saepe culpa nobis, libero ullam,
    //         tenetur quibusdam vitae sed aperiam atque aut! Ut iure obcaecati fugiat enim sequi. ",
    //         'created_at' => "3 min ago",
    //         'creator' => "Oshit sd"
    //     ]
    // ];

    public function mount()
    {
        $this->comments = ModelComment::latest()->get();
    }
    public function updated($field)
    {
        $this->validateOnly($field, [
            'newCommnet' => 'required|max:255'
        ]);
    }

    public function addComment()
    {
        $this->validate([
            'newCommnet' => 'required|max:255'
        ]);
        // if ($this->newCommnet == '') {
        //     return;
        // }
        $createComment = ModelComment::create([
            'body' => $this->newCommnet,
            'user_id' => 1,
        ]);
        $this->comments->prepend($createComment);
        // $this->comments->push($createComment);
        // array_unshift($this->comments, [
        //     'body' => $this->newCommnet,
        //     'created_at' => "1 min ago",
        //     'creator' => "Bappy"
        // ]);
        // $this->comments[] = [
        //     'body' => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Et harum cum nam, saepe culpa nobis, libero ullam,
        //     tenetur quibusdam vitae sed aperiam atque aut! Ut iure obcaecati fugiat enim sequi. ",
        //     'created_at' => "1 min ago",
        //     'creator' => "Bappy"
        // ];

        $this->newCommnet = "";
    }
    public function remove($id)
    {
        $comment = ModelComment::find($id)->delete();

        // $this->comments = $this->comments->where('id', '!=', $id);
        $this->comments = $this->comments->except($id);
    }
    public function render()
    {
        return view('livewire.comment');
    }
}

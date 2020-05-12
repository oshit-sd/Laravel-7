<?php

namespace App\Http\Controllers;

use App\Http\Requests\TodoCreateRequest;
use App\Step;
use App\Todo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TodoController extends Controller
{
    public function __construct()
    {
        // $this->middleware('auth')->except('index');
        // $this->middleware('auth')->only('index');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $todos = Todo::oldest('completed')->get();
        $todos = auth()->user()->todos()->oldest('completed')->get();
        return view('todos.index', compact('todos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('todos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TodoCreateRequest $request)
    {
        // $request->validate([
        //     'title' => 'required|max:255'
        // ]);

        // custom validate message
        // $rules = [
        //     'title' => 'required|max:255'
        // ];
        // $messages = [
        //     'title.required' => 'The Title is required.',
        // ];

        // $validator = Validator::make($request->all(), $rules, $messages);
        // if ($validator->fails()) {
        //     return redirect()->back()
        //         ->withErrors($validator)
        //         ->withInput();
        // }

        $todo = auth()->user()->todos()->create($request->all());
        if ($request->step) {
            foreach ($request->step as $step) {
                $todo->steps()->create(['name' => $step]);
            }
        }
        // Todo::create($request->all());
        return redirect(route('todo.index'))->with('message', "Todo Create Successfully");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function show(Todo $todo)
    {
        return view('todos.show', compact('todo'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function edit(Todo $todo)
    {
        return view('todos.edit', compact('todo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function update(TodoCreateRequest $request, Todo $todo)
    {
        // $request->validate([
        //     'title' => 'required|max:255'
        // ]);
        $todo->update($request->all());
        if ($request->stepName) {
            foreach ($request->stepName as $key => $value) {
                $step = Step::find($request->stepId[$key]);
                if (!$step) {
                    $todo->steps()->create(['name' => $value]);
                } else {
                    $todo->update(['name' => $value]);
                }
            }
        }
        return redirect(route('todo.index'))->with('message', "Todo updated Successfully");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Todo $todo)
    {
        $todo->steps->each->delete();
        $todo->delete();
        return redirect()->back()->with('message', "Task Deleted ");
    }

    /**
     * @param  \Illuminate\Http\Request  $request
     */
    public function complete(Todo $todo)
    {
        $todo->update(['completed' => true]);
        return redirect()->back()->with('message', "Task Marked as Completed");
    }

    /**
     * @param  \Illuminate\Http\Request  $request
     */
    public function incomplete(Todo $todo)
    {
        $todo->update(['completed' => false]);
        return redirect()->back()->with('message', "Task Marked as Incompleted");
    }
}

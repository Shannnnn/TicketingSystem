<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\HelpTopic;

class HelpTopicController extends Controller
{
    public function __construct() {
        $this->middleware(['auth', 'isAdmin']); //isAdmin middleware lets only users with a //specific permission permission to access these resources
    }

    public function index() {

        $help_topics = HelpTopic::paginate(10);
        return view('tickets.settings.help_topics.index')->with('help_topics', $help_topics);
    }

    public function create() {

        return view('tickets.settings.help_topics.create');
    }

    public function store(Request $request) {
        $this->validate($request, [
            'topic'=>'required'
        ]);

        $topic = $request['topic'];
        $help_topic = new HelpTopic();
        $help_topic->topic = $topic;
        $help_topic->save();

        return redirect()->route('topics.index');
    }

    public function show($id) {

        return redirect('topics');
    }

    public function destroy($id) {
        $help_topic = HelpTopic::findOrFail($id);
        $help_topic->delete();

        return redirect()->route('topics.index');
    }
}

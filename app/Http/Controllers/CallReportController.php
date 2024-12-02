<?php
    namespace App\Http\Controllers;

    use App\Models\Call;
    use App\Models\Agent;
    use Illuminate\Http\Request;
    
    class CallReportController extends Controller
    {
        public function index(Request $request)
        {
            $query = Call::with(['customer', 'agent']);
            $calls = $query->paginate(15);
            $agents = Agent::all();
            return view('calls.index', compact('calls','agents'));
        }
        
        public function filter(Request $request)
        {
            $request->validate([
                'agent_id' => ['required'], // Must match an ID in the agents table
                'start_date' => ['required', 'date'], // Must be a valid date
                'end_date' => ['required', 'date', 'after_or_equal:start_date'], // Must be after or equal to start_date
            ]);
            $query = Call::with(['customer', 'agent']);
            // Filtering by agent
            if ($request->has('agent_id')) {
                $query->where('agent_id', $request->agent_id);
            }
    
            // Filtering by date range
            if ($request->has('start_date') && $request->has('end_date')) {
                $query->whereBetween('created_at', [$request->start_date, $request->end_date]);
            }
    
            // Paginate results
            $calls = $query->paginate(15);
            $agents = Agent::all();
            return view('calls.index', compact('calls','agents'));
        }
    }
    
?>
<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function index()
    {
        return User::orderBy('points', 'desc')->get();
    }

    // Add a new user
    public function store(Request $request)
    {
        $user = User::create($request->all());
        return response()->json($user, 201);
    }

    // Update user points
    public function updatePoints(Request $request, User $user)
    {
        $user->points += $request->points_change;
        $user->save();

        return response()->json($user);
    }

    // Delete user
    public function destroy(User $user)
    {

        $user->delete();
        $response["message"] = "User Deleted";
        return response()->json($response, 200);
    }

    // Show user details
    public function show(User $user)
    {
        return response()->json($user);
    }

    // Group users by points and show average age
    public function groupByScore()
    {
        $users = User::all();
        $grouped = $users->groupBy('points');
        $result = [];

        foreach ($grouped as $points => $group) {
            $averageAge = $group->avg('age');
            $names = $group->pluck('name')->toArray();
            $result[$points] = [
                'names' => $names,
                'average_age' => $averageAge
            ];
        }

        return response()->json($result);
    }
    public function getUsersGroupedByScore()
    {
        $usersGroupedByScore = User::select(DB::raw('points, GROUP_CONCAT(name) as names, AVG(age) as average_age'))
            ->groupBy('points')
            ->get()
            ->mapWithKeys(function ($item) {
                return [
                    $item->points => [
                        'names' => explode(',', $item->names),
                        'average_age' => round($item->average_age, 2),
                    ]
                ];
            });

        return response()->json($usersGroupedByScore);
    }
}

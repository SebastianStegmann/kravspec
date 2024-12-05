<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Spec extends Model
{
    use HasFactory;
    //
    public function usersWithRoles()
    {
        return $this->belongsToMany(User::class, 'spec_role_user')->withPivot('role_id');
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class, 'spec_role_user');
    }

    public function rows()
    {
        return $this->hasMany(SpecRow::class);
    }

    public function fetchTimelineOfAcceptedChanges()
    {
        return $this->rows()->where('accepted_at', '!=', 0)
            ->orderBy('accepted_at', 'asc')
            ->pluck('accepted_at')
            ->unique();
    }

    public function getGroupedNonAcceptedRows()
    {
        $allRows = $this->rows()->get();

        $groupedRows = $allRows->groupBy('row_identifier');

        $result = [];
        $count = 0;
        foreach ($groupedRows as $identifier => $allRows) {
            // Fetch all non-accepted rows
            $nonAcceptedRows = $allRows->where('accepted_at', 0);

            foreach ($nonAcceptedRows as $row) {

                $result[$count] = $row;
                $count++;
            }
        }

        return $result;
    }

    public function getGroupedLatestRows()
    {
        $allRows = $this->rows()->get();

        $groupedRows = $allRows->groupBy('row_identifier');

        $result = collect();
        foreach ($groupedRows as $identifier => $allRows) {
            $latestRow = $allRows->whereNull('deleted_at')
                ->whereNotNull('accepted_at')
                ->where('accepted_at', '!=', 0)
                ->sortByDesc('accepted_at')
                ->first();

            if ($latestRow) {
                $result->put($identifier, $latestRow);
            }
        }

        return $result;
    }
}

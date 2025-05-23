<?php

namespace App\Http\Traits;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Query\Builder as QueryBuilder;
use Illuminate\Database\Eloquent\Builder as EloquentBuilder;

trait CanLoadRelationships
{
    public function loadRelationships(Model|QueryBuilder|EloquentBuilder $for, array $relations): Model|QueryBuilder|EloquentBuilder
    {
        foreach ($relations as $relation) {
            $for->when(
                $this->shouldIncludeRelation($relation),
                fn($q) => $for instanceof Model ? $q->load($relation) : $q->with($relation)
            );
        }
        return $for;
    }
    protected function shouldIncludeRelation(string $relation): bool
    {
        $include = request()->query('include');
        if  (!$include){
            return false;
        }
        $relations = array_map('trim', explode(',', $include));
        return in_array($relation, $relations);
    }
}

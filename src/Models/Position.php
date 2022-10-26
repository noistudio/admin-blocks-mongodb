<?php

namespace AdminBlocks\Models;

use Jenssegers\Mongodb\Eloquent\Model;

class Position extends Model
{

    protected $table = null;

    function __construct(array $attributes = [])
    {
        $this->collection= config("admin_blocks.tables.positions");
    }

    public function blocks()
    {
        return $this->hasMany(Block::class,"position_id","id")->orderBy("sort");
    }

}

<?php

namespace AdminBlocks\Models;

use Jenssegers\Mongodb\Eloquent\Model;

class Block extends Model
{

    protected $fillable = ['data'];
    protected $table = null;


    function __construct(array $attributes = [])
    {
        $this->collection= config("admin_blocks.tables.blocks");
    }

    public function position()
    {
        return $this->embedsOne(Position::class);
    }

    public function  runBlock(){

        $find_type=config("admin_blocks.types.".$this->type);
        $tmp_object=new $find_type();
        return $tmp_object->run($this);
    }

}

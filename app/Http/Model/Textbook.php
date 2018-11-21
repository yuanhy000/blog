<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class Textbook extends Model
{
    protected $table = 'textbook';
    protected $primaryKey = 'text_id';
    public $timestamps = false;
    protected $guarded = [];

    public function tree()
    {
        $textbooks = $this->orderBy('text_id', 'asc')->get();
        return $this->getTree($textbooks, 'text_name', 'text_id', 'text_pid', 0);
    }

    //将子分类放到父分类下
    public function getTree($data, $field_name, $field_id = 'id', $field_pid = 'pid', $pid = 0)
    {
        $arr = array();
        foreach ($data as $k => $v) {
            if ($v->$field_pid == $pid) {
                $data[$k]["_" . $field_name] = $data[$k][$field_name];
                $arr[] = $data[$k];
                foreach ($data as $m => $n) {
                    if ($n->$field_pid == $v->$field_id) {
                        $data[$m]["_" . $field_name] = '├───  ' . $data[$m][$field_name];
                        $arr[] = $data[$m];
                    }
                }
            }
        }
        return $arr;
    }
}

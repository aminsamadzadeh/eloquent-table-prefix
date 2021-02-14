<?php

namespace AminSamadzadeh\EloquentTablePrefix;

use Illuminate\Database\Eloquent\Model as BaseModel;
use Str;

class Model extends BaseModel
{
	public $prefix = '';

    /**
     * Get the table associated with the model.
     * Overriding getTable method from model abstract class to add prefix.
     *
     * @return string
     */

	public function getTable()
    {
    	if ( $this->emptyPrefix() ) {
    		return parent::getTable();
    	}

        $parentTable = parent::getTable();

        if ( $this->hasPrefix($parentTable) ){
            return $parentTable;
        }

        return $this->getPrefix() .'_'. $parentTable;
    }

    /**
     * Get the joining table name for a many-to-many relation.
     * Overriding joiningTable method from HasRelationships trait to add prefix.
     *
     * @param  string  $related
     * @param  \Illuminate\Database\Eloquent\Model|null  $instance
     * @return string
     */

    public function joiningTable($related, $instance = null)
    {
    	if ( $this->emptyPrefix() ) {
    		return parent::joiningTable($related, $instance);
    	}

        $parentJoiningTable = parent::joiningTable($related, $instance);
        if ( $this->hasPrefix($parentJoiningTable) ) {
            return $parentJoiningTable;
        }

    	return $this->getPrefix(). '_' . parent::joiningTable($related, $instance);
    }

    /**
     * Check table name has prefix or not.
     *
     * @param  string  $table
     * @return bool
     */
    public function hasPrefix($table)
    {
        return Str::of($table)->contains($this->getPrefix());
    }

    /**
     * Check table prefixc is set or not.
     *
     * @return bool
     */
    protected function emptyPrefix()
    {
    	return empty($this->getPrefix());
    }

    /**
     * Get auto generated prefix table from model namespace.
     *
     * @return string
     */
    public function getPrefix()
    {
		return $this->prefix;
    }
}
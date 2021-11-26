<?php

namespace depexorPackages\SiteStats\Models;


class Referrers extends Base
{
    protected $table = 'stats_referrers';
    protected $fillable = [
        'referrer_hash',
        'referrer',
        'referrer_domain_id',
        'referrer_path_id',
        'is_internal',
        'updated_at',
    ];


    public function domain()
    {
        return $this->belongsTo('depexorPackages\SiteStats\Models\ReferrersDomains' ,'referrer_domain_id' );
    }

    public function path()
    {
        return $this->belongsTo('depexorPackages\SiteStats\Models\ReferrersPaths','referrer_path_id');
    }


}
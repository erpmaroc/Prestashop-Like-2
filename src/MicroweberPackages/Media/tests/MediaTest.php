<?php

namespace depexorPackages\Media\tests;

use depexorPackages\Core\tests\TestCase;

use Illuminate\Database\Eloquent\Model;

use depexorPackages\Media\Traits\MediaTrait;

class ContentTestModel extends Model
{
    use MediaTrait;

    protected $table = 'content';

  /*  public static function boot()
    {
        parent::boot();

    }*/

}

class MediaTest extends TestCase
{
    public function testAddMediaToModel()
    {
        $newPage = new ContentTestModel();
        $newPage->title = 'Pictures from Sofia';

        $newPage->addMedia([
            'filename' => 'http://DESKTOP-COEV57U/./lorempixel.com/400/200/',
            'title' => 'View from Vitosha'
        ]);

//        $newPage->addMedia([
//            'filename' => 'http://lorempixel.com/400/200/',
//            'title' => 'View from Vitosha 2'
//        ]);
//
//        $newPage->addMedia([
//            'filename' => 'http://lorempixel.com/400/200/',
//            'title' => 'View from Vitosha 3'
//        ]);

        $newPage->save();

        $this->assertNotEmpty($newPage->media());
        $this->assertNotEmpty($newPage->media);

    }

    public function testDeleteMediaToModel()
    {
        $newPage = new ContentTestModel();

        $newPage->title = 'Pictures from Sofia';
        $newPage->addMedia([
            'filename' => 'http://DESKTOP-COEV57U/./lorempixel.com/400/200/',
            'title' => 'View from Vitosha MUST DELETE!'
        ]);

        $newPage->addMedia([
            'filename' => 'http://DESKTOP-COEV57U/./lorempixel.com/400/200/',
            'title' => 'View from Vitosha 3'
        ]);

        $newPage->addMedia([
            'filename' => 'http://DESKTOP-COEV57U/./lorempixel.com/400/200/',
            'title' => 'View from Vitosha 4'
        ]);

        $newPage->save();

        $newPage->deleteMediaById($newPage->media[0]->id);

        foreach ($newPage->media()->get() as $media) {
            $media->delete();
        }

        $this->assertEmpty($newPage->media->toArray());
    }
}
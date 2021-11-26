<?php
namespace depexorPackages\Content\tests;

use depexorPackages\Core\tests\TestCase;
use depexorPackages\Utils\Misc\ContentExport;

class ContentExportTest extends TestCase
{

	public function testExport()
	{
		$export = new ContentExport();
		$export->setExportFormatType('json');
		$exportStatus = $export->start();

		$this->assertArrayHasKey('filename', $exportStatus);
		$this->assertArrayHasKey('success', $exportStatus);
	}

	public function testExportWithWrongFormat()
	{
		$export = new ContentExport();
		$export->setExportFormatType('xmla');
		$exportStatus = $export->start();

		$this->assertArrayHasKey('error', $exportStatus);
	}

	public function testExportWithWrongFileDownload()
	{
		$export = new ContentExport();

		$download = $export->download('wfafwa');

		$this->assertArrayHasKey('error', $download);
	}
}

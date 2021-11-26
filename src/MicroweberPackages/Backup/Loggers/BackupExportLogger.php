<?php
namespace depexorPackages\Backup\Loggers;

use depexorPackages\Backup\Loggers\BackupDefaultLogger;

class BackupExportLogger extends BackupDefaultLogger
{
	public static $logName = 'Exporting';
	public static $logFileName = 'backup-export-session.log';
	
}
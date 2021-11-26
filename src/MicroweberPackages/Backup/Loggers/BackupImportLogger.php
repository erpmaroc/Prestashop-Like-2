<?php
namespace depexorPackages\Backup\Loggers;

use depexorPackages\Backup\Loggers\BackupDefaultLogger;

final class BackupImportLogger extends BackupDefaultLogger
{
	public static $logName = 'Importing';
	public static $logFileName = 'backup-import-session.log';
	
}
<?php defined('BASEPATH') ; ?>

A PHP Error was encountered

Severity:    <?php echo html_escape($severity), "\n"; ?>
Message:     <?php echo html_escape($message), "\n"; ?>
Filename:    <?php echo $filepath, "\n"; ?>
Line Number: <?php echo html_escape($line); ?>

<?php if (defined('SHOW_DEBUG_BACKTRACE') && SHOW_DEBUG_BACKTRACE === TRUE): ?>

Backtrace:
<?php	foreach (debug_backtrace() as $error): ?>
<?php		if (isset($error['file']) && strpos($error['file'], realpath(BASEPATH)) !== 0): ?>
	File: <?php echo $error['file'], "\n"; ?>
	Line: <?php echo $error['line'], "\n"; ?>
	Function: <?php echo html_escape($error['function']), "\n\n"; ?>
<?php		endif ?>
<?php	endforeach ?>

<?php endif ?>

<?php
namespace Zekfad\FB2;


class UnimplementedError extends \ErrorException {
	public function __construct(?string $message = null) {
		parent::__construct(
			message: $message ?? 'Unimplemented function: ' . debug_backtrace(!DEBUG_BACKTRACE_PROVIDE_OBJECT | DEBUG_BACKTRACE_IGNORE_ARGS, 2)[1]['function'],
			code: 0,
			severity: E_WARNING
		);
	}
}

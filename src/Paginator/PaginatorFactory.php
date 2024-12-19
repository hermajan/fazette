<?php
namespace Fazette\Paginator;

/**
 * Factory interface for creating instances of PaginatorControl.
 */
interface PaginatorFactory {
	/**
	 * Creates and returns a new PaginatorControl instance, optionally using the provided template.
	 *
	 * @param string|null $template The optional template to be used for the paginator. Defaults to null.
	 * @return PaginatorControl The created PaginatorControl instance.
	 */
	public function create(?string $template = null): PaginatorControl;
}

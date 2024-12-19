<?php
namespace Fazette\Paginator;

use Contributte\Translation\Translator as ContributteTranslator;
use Nette\Application\UI\Control;
use Nette\Bridges\ApplicationLatte\DefaultTemplate;
use Nette\FileNotFoundException;
use Nette\Localization\Translator;
use Nette\Utils\Paginator;

/**
 * Class PaginatorControl
 *
 * Represents a UI control for managing pagination in a web application.
 * Provides functionality for rendering the pagination template, managing the paginator state, generating pagination steps, and handling translations for the control.
 */
class PaginatorControl extends Control {
	/** @persistent @var int Current page number */
	public int $page = 1;
	
	/** @var string The file path to the template being used. */
	protected string $templateFile;
	
	/** @var Translator|null The translator instance or null if not set. */
	protected ?Translator $translator = null;
	
	/** @var Paginator Holds the Nette paginator instance. */
	protected Paginator $paginator;
	
	/** @var bool True if pagination buttons should have texts. False if it should have arrows. */
	protected bool $textable = false;
	
	public function __construct(?string $template = null, ?Translator $translator = null) {
		$this->setTemplateFile($template);
		
		$this->translator = $translator;
		if($translator instanceof ContributteTranslator) {
			$this->translator->addResource("neon", __DIR__."/../locale/fazette.cs.neon", "cs", "fazette");
			$this->translator->addResource("neon", __DIR__."/../locale/fazette.en.neon", "en", "fazette");
		}
		
		$this->paginator = new Paginator();
	}
	
	/**
	 * Retrieves the paginator instance.
	 */
	public function getPaginator(): Paginator {
		return $this->paginator;
	}
	
	public function isTextable(): bool {
		return $this->textable;
	}
	
	public function setTextable(bool $textable): PaginatorControl {
		$this->textable = $textable;
		return $this;
	}
	
	/**
	 * Renders the template by setting up the translator, assigning necessary parameters, setting the file, and invoking the render process.
	 */
	public function render(): void {
		/** @var DefaultTemplate $template */
		$template = $this->getTemplate();
		$template->setTranslator($this->translator)
			->setParameters(["paginator" => $this->getPaginator(), "steps" => $this->getSteps(), "textable" => $this->textable])
			->setFile($this->templateFile)
			->render();
	}
	
	/**
	 * Sets the template file for the paginator control. If the provided filename is null or empty, a default template file is used. Validates the existence of the file before setting it. If the file does not exist in the specified or default locations, an exception is thrown.
	 *
	 * @param string|null $filename Path to the template file or null to use the default template.
	 * @return PaginatorControl Returns the current instance of the PaginatorControl for method chaining.
	 * @throws FileNotFoundException If the specified or default template file is not found.
	 */
	public function setTemplateFile(?string $filename = null): PaginatorControl {
		if(empty($filename)) {
			$filename = "default";
		}
		
		if(!is_file($filename)) {
			if(is_file(__DIR__."/templates/".$filename.".latte")) {
				$filename = __DIR__."/templates/".$filename.".latte";
			} else {
				throw new FileNotFoundException("Template file '".$filename."' was not found.");
			}
		}
		
		$this->templateFile = $filename;
		return $this;
	}
	
	/**
	 * Generates and returns an array of pagination steps based on the current page, the total page count, and a predefined range logic.
	 *
	 * @return array An array of integers representing the steps to be displayed in the pagination.
	 */
	public function getSteps(): array {
		$page = $this->paginator->getPage();
		
		if($this->paginator->getPageCount() < 2) {
			$steps = [$page];
		} else {
			$arr = range(max($this->paginator->getFirstPage(), $page - 3), min((int)$this->paginator->getLastPage(), $page + 3));
			$count = 4;
			$quotient = ($this->paginator->getPageCount() - 1) / $count;
			
			for($i = 0; $i <= $count; $i++) {
				$arr[] = round($quotient * $i) + $this->paginator->getFirstPage();
			}
			
			sort($arr);
			
			$steps = array_values(array_unique($arr));
		}
		
		return $steps;
	}
	
	/**
	 * Loads the state of the paginator using the provided parameters and updates the current page.
	 *
	 * @param array $params An associative array of parameters for setting the paginator state.
	 */
	public function loadState(array $params): void {
		parent::loadState($params);
		
		$this->getPaginator()->page = $this->page;
	}
}

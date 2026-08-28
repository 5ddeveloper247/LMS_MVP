<?php

namespace App\Libraries;

require_once base_path('vendor/fpdf/fpdf/src/Fpdf/Fpdf.php');
// Load FPDI autoloader to ensure all FPDI classes are available
require_once base_path('vendor/setasign/fpdi/src/autoload.php');
require_once base_path('vendor/setasign/fpdi/src/FpdiTrait.php');
require_once base_path('vendor/setasign/fpdi/src/FpdfTplTrait.php');
require_once base_path('vendor/setasign/fpdi/src/FpdfTrait.php');

use Fpdf\Fpdf;
use setasign\Fpdi\FpdiTrait;
use setasign\Fpdi\FpdfTplTrait;
use setasign\Fpdi\FpdfTrait;

/**
 * Custom FPDI class that works with namespaced FPDF
 * This avoids the need for global namespace FPDF class
 */
class CustomFpdi extends Fpdf
{
    use FpdiTrait;
    use FpdfTplTrait;
    use FpdfTrait {
        // Resolve method collisions - use FpdfTrait methods instead of FpdfTplTrait
        // These methods are needed for imported PDF pages functionality
        FpdfTrait::useTemplate insteadof FpdfTplTrait;
        FpdfTrait::getTemplateSize insteadof FpdfTplTrait;
        FpdfTrait::_putimages insteadof FpdfTplTrait;
        FpdfTrait::_putxobjectdict insteadof FpdfTplTrait;
    }
}

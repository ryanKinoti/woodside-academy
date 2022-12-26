<?php

namespace App\Charts;

use ConsoleTVs\Charts\Classes\Chartjs\Chart;

class ApplicationsChart extends Chart
{
    /**
     * Initializes the chart.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    public function elementLabel($label): static
    {
        $this->element_label = $label;
        return $this;
    }

    public function values($values)
    {
        $this->values = $values;
        return $this;
    }

    public function dimensions($width, $height)
    {
        $this->width = $width;
        $this->height = $height;
        return $this;
    }

    public function responsive($responsive)
    {
        $this->responsive = $responsive;
        return $this;
    }

}

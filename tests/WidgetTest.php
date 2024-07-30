<?php

use Oosterhoff\FilamentSimpleanalytics\Widgets\VisitorsPageviewsWidget;

it('can render visitors and pageviews widget', function () {
    $widget = new VisitorsPageviewsWidget();
    
    expect($widget)->toBeInstanceOf(VisitorsPageviewsWidget::class);
});
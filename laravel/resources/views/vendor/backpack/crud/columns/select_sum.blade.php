{{-- relationships with pivot table (n-n) --}}
<td>
    <?php
    $results = $entry->{$column['entity']};

    if ($results && $results->count()) {
        $results_array = $results->pluck($column['attribute']);
        $result = array_sum($results_array->toArray());
        echo $result;
    } else {
        echo '-';
    }
    ?>
</td>

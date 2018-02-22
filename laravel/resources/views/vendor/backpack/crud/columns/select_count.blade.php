{{-- relationships with pivot table (n-n) --}}
<td>
    <?php
    $results = $entry->{$column['entity']};

    if ($results && $results->count()) {
        $results_array = $results->pluck($column['attribute']);
        $result = count($results_array->toArray());
        echo $result;
    } else {
        echo '-';
    }
    ?>
</td>

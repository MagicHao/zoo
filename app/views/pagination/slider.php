<?php
$presenter = new Illuminate\Pagination\CustomerPresenter($paginator);
?>

<?php if ($paginator->getLastPage() > 1): ?>
    <div class="ui-pagination">
        <?php echo $presenter->render(); ?>
    </div>
<?php endif; ?>
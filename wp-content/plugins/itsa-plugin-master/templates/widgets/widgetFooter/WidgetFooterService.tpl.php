<?php
$total = count($pages);
$columns = 3;
$per_column = ceil($total / $columns);

// Chia mảng pages thành 3 nhóm
$chunks = array_chunk($pages, $per_column);
?>

<?php foreach ($chunks as $chunk) : ?>
    <div>
        <ul class="flex flex-col gap-1">
            <?php foreach ($chunk as $page) : ?>
                <li>
                    <a class="link-underline-hover uppercase font-medium" href="<?php echo get_permalink($page); ?>">
                        <?php echo esc_html($page->post_title); ?>
                    </a>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
<?php endforeach; ?>

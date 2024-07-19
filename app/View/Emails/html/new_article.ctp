<h2>New Article Notification</h2>
<p><strong>Title:</strong> <?php echo h($article['Article']['articles_name']); ?></p>
<p><strong>Description:</strong> 
            <?php $description = h($article['Article']['articles_description']);
            $maxLength = 80; // Maximum length of the description
            if (strlen($description) > $maxLength) {
                echo substr($description, 0, $maxLength) . '...';
            } else {
                echo $description;
            } 
            ?>
</p>
<p><strong>Author:</strong> <?php echo h($user['name']); ?></p>
<p><strong>Category:</strong> <?php echo h($categoryName); ?></p>
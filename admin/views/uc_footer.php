<?php defined('EMLOG_ROOT') || exit('access denied!'); ?>
</div>
</div>
</div>
</main>
<footer class="py-3">
    <div class="text-center">
        <small>© <?= date("Y") ?> <?= Option::get('blogname') ?> </small>
    </div>
</footer>
<?php doAction('adm_footer') ?>
<script src="./views/js/sb-admin-2.min.js?t=<?= Option::EMLOG_VERSION_TIMESTAMP ?>"></script>
</body>

</html>
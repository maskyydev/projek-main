<nav id="sidebar" class="sidebar js-sidebar">
    <div class="sidebar-content js-simplebar">
        <a class="sidebar-brand" href="<?= base_url(); ?>">
            <span class="align-middle">Manajemen Mutu Terintegrasi</span>
        </a>

        <ul class="sidebar-nav">
            <?php
            $renderedMenus = [];

            foreach ($MenuCategory as $mCategory) :
                $Menu = getMenu($mCategory['menuCategoryID'], $user['role']);
                $hasValidMenu = false;

                foreach ($Menu as $menu) {
                    if (!in_array($menu['menu_id'], $renderedMenus)) {
                        $hasValidMenu = true;
                        break;
                    }
                }

                if (!$hasValidMenu) continue;
            ?>
                <li class="sidebar-header">
                    <?= esc($mCategory['menu_category']); ?>
                </li>

                <?php foreach ($Menu as $menu) :
                    if (in_array($menu['menu_id'], $renderedMenus)) continue;
                    $renderedMenus[] = $menu['menu_id'];

                    // Deteksi apakah icon adalah Font Awesome atau Feather
                    $isFontAwesome = strpos($menu['icon'], 'fa') !== false;
                    $iconClass = esc($menu['icon']);
                ?>

                    <?php if ($menu['parent'] == 0) : ?>
                        <li class="sidebar-item <?= ($segment == $menu['url']) ? 'active' : ''; ?>">
                            <a class="sidebar-link" href="<?= base_url($menu['url']); ?>">
                                <?php if ($isFontAwesome): ?>
                                    <i class="<?= $iconClass ?> me-2"></i>
                                <?php else: ?>
                                    <i class="align-middle" data-feather="<?= $iconClass ?>"></i>
                                <?php endif; ?>
                                <span class="align-middle"><?= esc($menu['title']); ?></span>
                            </a>
                        </li>
                    <?php else :
                        $SubMenu = getSubMenu($menu['menu_id'], $user['role']);
                    ?>
                        <li class="sidebar-item <?= ($segment == $menu['url']) ? 'active' : ''; ?>">
                            <a data-bs-target="#<?= esc($menu['url']); ?>" data-bs-toggle="collapse"
                               class="sidebar-link <?= ($segment == $menu['url']) ? '' : 'collapsed'; ?>"
                               aria-expanded="<?= ($segment == $menu['url']) ? 'true' : 'false'; ?>">
                                <?php if ($isFontAwesome): ?>
                                    <i class="<?= $iconClass ?> me-2"></i>
                                <?php else: ?>
                                    <i class="align-middle" data-feather="<?= $iconClass ?>"></i>
                                <?php endif; ?>
                                <span class="align-middle"><?= esc($menu['title']); ?></span>
                            </a>
                            <ul id="<?= esc($menu['url']); ?>" class="sidebar-dropdown list-unstyled collapse<?= ($segment == $menu['url']) ? ' show' : ''; ?>" data-bs-parent="#sidebar">
                                <?php foreach ($SubMenu as $subMenu) : ?>
                                    <li class="sidebar-item <?= ($subsegment == $subMenu['url']) ? 'active' : ''; ?>">
                                        <a class="sidebar-link" href="<?= base_url($menu['url'] . '/' . $subMenu['url']); ?>">
                                            <?= esc($subMenu['title']); ?>
                                        </a>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        </li>
                    <?php endif; ?>
                <?php endforeach; ?>
            <?php endforeach; ?>
        </ul>
    </div>
</nav>

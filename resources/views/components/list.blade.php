<div class="hello__list">

    <div class="hello__list-buttons">
        <a href="/list"
           class="hello__list-button <?php echo $requestType === 'all' ? 'hello__list-button--active' : ''; ?>">Усі
            окупанти</a>
        <a href="/list?type=find"
           class="hello__list-button <?php echo $requestType === 'find' ? 'hello__list-button--active' : ''; ?>">Нужно
            знайти</a>
        <a href="/list?type=send"
           class="hello__list-button <?php echo $requestType === 'send' ? 'hello__list-button--active' : ''; ?>">Нужно
            написати</a>
    </div>

    <div class="hello__list-items">
        <div class="hello__list-item hello__list-item--header">
            <div class="hello__list-cell hello__list-cell--header">Статус</div>
            <div class="hello__list-cell hello__list-cell--header">ПІБ</div>
            <div class="hello__list-cell hello__list-cell--header">Інформація</div>
            <div class="hello__list-cell hello__list-cell--header"></div>
        </div>
    </div>

    <div class="hello__list-items" data-hello-list-items>
        <?php foreach ($orcs as $orc):

        $itemClassName = 'hello__list-item--done';
        $itemStatusName = 'Знайшли та написали';
        $itemLink = '<a href="occupant/item/' . $orc->id . '" class="hello__list-cell-button button">Написати</a>';

        if (count($orc->orcs) === 0) {
            $itemClassName = 'hello__list-item--not-find';
            $itemStatusName = 'Потрібно знайти';
            $itemLink = '<a href="occupant/item/' . $orc->id . '" class="hello__list-cell-button button">Знайти</a>';
        } elseif (!$orc->is_checked) {
            $itemClassName = 'hello__list-item--not-send';
            $itemStatusName = 'Потрібно написати';
            $itemLink = '<a href="occupant/item/' . $orc->id . '" class="hello__list-cell-button button">Написати</a>';
        }

        ?>

        <div class="hello__list-item <?= $itemClassName ?>">
            <div class="hello__list-cell">
                <div class="hello__list-cell-mobile-name">Статус</div>
                <?= $itemStatusName ?>
            </div>

            <div class="hello__list-cell">
                <div class="hello__list-cell-mobile-name">ПІБ</div>
                <?= $orc->fio ?>
            </div>
            <div class="hello__list-cell">
                <div class="hello__list-cell-mobile-name">Інформація</div>
                <?= $orc->person ?>
                <?= $orc->l_number ?>
                <?= $orc->tab_number ?>
            </div>

            <div class="hello__list-cell"><?= $itemLink ?></div>
        </div>

        <?php endforeach; ?>
    </div>


    <?php
    if ($total > 100):
    ?>

    <div class="hello__list-pagination">

        <?php
        for ($index = 0; $index < ($total / 100); $index++):

            $link = '/list?type=' . $type . '&skip=' . $index * 100;
            $linkClassName = 'hello__list-pagination-button';

            if ($skip == $index * 100) {
                $linkClassName = 'hello__list-pagination-button hello__list-pagination-button--active';
            }

            $button = '<a href="' . $link . '" class="' . $linkClassName . '">' . ($index + 1) . '</a>';

            echo $button;

        endfor;
        ?>
    </div>

    <?php
    endif;
    ?>
</div>

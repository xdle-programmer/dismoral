<div class="hello__list">
    <div class="hello__list-buttons">
        <a href="/list" class="hello__list-button hello__list-button--active">Все</a>
        <a href="/list?type=find" class="hello__list-button">Нужно найти</a>
        <a href="/list?type=send" class="hello__list-button">Нужно написать</a>
    </div>

    <div class="hello__list-items">
        <div class="hello__list-item hello__list-item--header">
            <div class="hello__list-cell hello__list-cell--header">Статус</div>
            <div class="hello__list-cell hello__list-cell--header">ФИО</div>
            <div class="hello__list-cell hello__list-cell--header">Информация</div>
            <div class="hello__list-cell hello__list-cell--header"></div>
        </div>
    </div>

    <div class="hello__list-items" data-hello-list-items>
        <?php foreach ($orcs as $orc):

        $itemClassName = 'hello__list-item--done';
        $itemStatusName = 'Нашли и написали';
        $itemLink = '<a href="occupant/item/' . $orc->id . '" class="hello__list-cell-button button">Написать</a>';

        if (count($orc->orcs) === 0) {
            $itemClassName = 'hello__list-item--not-find';
            $itemStatusName = 'Нужно найти';
            $itemLink = '<a href="occupant/item/' . $orc->id . '" class="hello__list-cell-button button">Найти</a>';
        } elseif (!$orc->is_checked) {
            $itemClassName = 'hello__list-item--not-send';
            $itemStatusName = 'Нужно написать';
            $itemLink = '<a href="occupant/item/' . $orc->id . '" class="hello__list-cell-button button">Написать</a>';
        }

        ?>

        <div class="hello__list-item <?= $itemClassName ?>">
            <div class="hello__list-cell">
                <div class="hello__list-cell-mobile-name">Статус</div>
                <?= $itemStatusName ?>
            </div>

            <div class="hello__list-cell">
                <div class="hello__list-cell-mobile-name">ФИО</div>
                <?= $orc->fio ?>
            </div>
            <div class="hello__list-cell">
                <div class="hello__list-cell-mobile-name">Информация</div>
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

<main>
    <nav class="nav">
        <ul class="nav__list container">
            <?php foreach ($categories as $category) : ?>
            <li class="nav__item">
                <a href="pages/all-lots.html"><?=htmlspecialchars($category['name']);?></a>
            </li>
            <?php endforeach; ?>
        </ul>
    </nav>
    <section class="lot-item container">
        <h2><?=$lot['lot_name']?></h2>
        <div class="lot-item__content">
            <div class="lot-item__left">
                <div class="lot-item__image">
                    <img
                        src="../<?=$lot['img_url']?>"
                        width="730"
                        height="548"
                        alt="<?=htmlspecialchars($category['name']);?>"
                    >
                </div>
                <p class="lot-item__category">
                    Категория: <span><?=$lot['category_name']?></span>
                </p>
                <p class="lot-item__description"><?=$lot['description']?></p>
            </div>
            <div class="lot-item__right">
                <div class="lot-item__state">
                    <div class="lot-item__timer timer <?=is_last_hour($lot['time_end']) ? "timer--finishing" : '' ?>">
                        <?=get_time_to_lot($lot['time_end'])?>
                    </div>
                    <div class="lot-item__cost-state">
                        <div class="lot-item__rate">
                            <span class="lot-item__amount">Текущая цена</span>
                            <span class="lot-item__cost">
                                <?=$current_bet?>
                            </span>
                        </div>
                        <div class="lot-item__min-cost">
                            Мин. ставка <span><?=$min_bet?></span>
                        </div>
                    </div>
                    <form
                        class="lot-item__form"
                        action="https://echo.htmlacademy.ru"
                        method="post"
                        autocomplete="off"
                    >
                        <p class="lot-item__form-item form__item form__item--invalid">
                            <label for="cost">Ваша ставка</label>
                            <input id="cost" type="text" name="cost" placeholder="12 000">
                            <span class="form__error">Введите наименование лота</span>
                        </p>
                        <button type="submit" class="button">Сделать ставку</button>
                    </form>
                </div>
                <div class="history">
                    <h3>История ставок (<span><?=$bet_count?></span>)</h3>
                    <table class="history__list">
                        <?php foreach ($bets as $bet) : ?>
                            <tr class="history__item">
                                <td class="history__name"><?=$bet['name']?></td>
                                <td class="history__price"><?=format_bet_cost($bet['cost'])?></td>
                                <td class="history__time"><?=format_bet_time($bet['time_start'])?></td>
                            </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
            </div>
        </div>
    </section>
</main>

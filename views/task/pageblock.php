



<div class="vakancy-page-block my-vacancies-block p-rel mb16">
                                    <div class="row">
                                        <div class="my-resume-dropdown dropdown show mb8">
                                            <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <img src="images/dots.svg" alt="dots">
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right"
                                                 aria-labelledby="dropdownMenuLink">
                                                <a class="dropdown-item" href="#">Редактировать</a>
                                                <a class="dropdown-item" href="#">Удалить</a>
                                            </div>
                                        </div>
                                        <div class="col-xl-12 my-vacancies-block__left-col mb16">
                                            <h2 class="mini-title mb8">PHP разработчик</h2>
                                            <div class="d-flex align-items-center flex-wrap mb8 ">
                                                <span class="mr16 paragraph"><?=$lr[$i]["salary"]?> ₽</span>
                                                <span class="mr16 paragraph"><?=$lr[$i]["city"] ?></span>
                                            </div>
                                            <div class="d-flex flex-wrap">
                                                <div class="paragraph mr16">
                                                    <strong>Просмотров</strong>
                                                    <span class="grey"><?=$lr[$i]["views"] ?></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div
                                                class="col-xl-12 d-flex justify-content-between align-items-center flex-wrap">
                                            <div class="d-flex flex-wrap mobile-mb12">
                                                <a class="mr16" href=<?='"'.$url2.'"'?>>Открыть</a>
                                            </div>
                                            <span class="mini-paragraph cadet-blue">Опубликовано: <?=$lr[$i]["pubdate"] ?></span>
                                        </div>
                                    </div>
    </div>
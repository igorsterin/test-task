<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%checkBox}}`.
 */
class m210118_163623_create_checkBox_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%checkBox}}', [
            'id' => $this->primaryKey(),
            'Полная занятость' => $this->text(),
            'Частичная занятость' => $this->text(),
            'Проектная/Временная работа' => $this->text(),
            'Волонтёрство' => $this->text(),
            'Стажировка' => $this->text(),
            'Полный день' => $this->text(),
            'Сменный график' => $this->text(),
            'Гибкий график' => $this->text(),
            'Удалённая работа' => $this->text(),
            'Вахтовый метод' => $this->text(),
        ], 'CHARSET=utf8 COLLATE utf8_general_ci');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%checkBox}}');
    }
}

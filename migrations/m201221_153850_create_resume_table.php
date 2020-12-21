<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%resume}}`.
 */
class m201221_153850_create_resume_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%resume}}', [
            'id' => $this->primaryKey(),
            'photo' => $this->text(),
            'lastname' => $this->text(),
            'name' => $this->text(),
            'middlename' => $this->text(),
            'birthdate' => $this->text(),
            'sex' => $this->text(),
            'city' => $this->text(),
            'email' => $this->text(),
            'mobile' => $this->text(),
            'specialization' => $this->text(),
            'salary' => $this->text(),
            'employment' => $this->text(),
            'shedule' => $this->text(),
            'aboutme' => $this->text(),
            'pubdate' => $this->datetime()->defaultExpression('CURRENT_TIMESTAMP'),
            'views' => $this->integer()->defaultValue(0),
        ], 'CHARSET=utf8 COLLATE utf8_general_ci');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%resume}}');
    }
}

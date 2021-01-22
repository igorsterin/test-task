<?php

use yii\db\Migration;

/**
 * Handles dropping columns from table `{{%resume}}`.
 */
class m210122_104543_drop_checkbox_column_from_resume_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
         $this->dropColumn('resume', 'employment');
         $this->dropColumn('resume', 'shedule');
         $this->renameColumn('resume', 'aboutme', 'about_me');
         $this->renameColumn('resume', 'pubdate', 'pub_date');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->addColumn('resume', 'employment', $this->integer());
        $this->addColumn('resume', 'shedule', $this->integer());
        $this->renameColumn('resume', 'about_me', 'aboutme');
        $this->renameColumn('resume', 'pub_date', 'pubdate');
    }
}

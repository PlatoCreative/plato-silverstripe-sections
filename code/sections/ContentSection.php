<?php
class ContentSection extends Section
{
    private static $db = array(
        'Content' => 'HTMLText'
    );

    private static $has_one = array(
        'Image' => 'Image'
    );

    public function getCMSFields()
    {
        $fields = parent::getCMSFields();
        $fields->addFieldsToTab("Root.Main", array(
            HTMLEditorField::create('Content')
        ));
        return $fields;
    }
}

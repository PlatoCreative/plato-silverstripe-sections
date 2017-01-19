<?php
/**
 * @package plato-silverstripe-sections
 */
class Section extends DataObject
{
    private static $db = array(
        'Sort' => 'Int',
        'Title' => 'Text'
    );

    private static $singular_name = 'Section';
    private static $plural_name = 'Sections';

    private static $default_sort = 'Sort ASC';

    private static $has_one = array(
        'Page' => 'Page'
    );

    public function getCMSFields()
    {
        return new FieldList(
            $rootTab = new TabSet("Root",
                $tabMain = new Tab('Main',
                    TextareaField::create('Title')
                )
            )
        );
    }

    public static $summary_fields = array(
        'Title' => 'Title',
        'NiceClass' => 'Type'
    );

    public static function Type()
    {
        return get_called_class();
    }

    public static function NiceClass($ClassName = null)
    {
        if (!$ClassName) {
            $ClassName = get_called_class();
        }
        if ($ClassName != 'Section') {
            return trim(preg_replace('/([A-Z])/', ' $1', str_ireplace('Section', '', $ClassName)));
        }
        return $ClassName;
    }

    public function Layout()
    {
        $renderWith = array(
            get_called_class(),
            'DefaultSection'
        );
        return $this->renderWith($renderWith);
    }
}

Module add possibility to set some setting which defined in system.xml as code editor.
Module is support next modes:
- html
- javascript
- json
- css

## Settings
By default code theme is set to down. You can change this by path:  
_Stores / Configuration / WS-CV-UA / Ace editor / Settings / Code theme_
<img width="985" alt="image" src="https://user-images.githubusercontent.com/29913902/172056636-11f072f8-2945-4f74-9a8f-f86aa42d1a70.png">

## Examples of using:
<img width="530" alt="image" src="https://user-images.githubusercontent.com/29913902/172056883-877cedb3-1999-45a6-aab5-ac8515531ce5.png">
<img width="480" alt="image" src="https://user-images.githubusercontent.com/29913902/172056901-5fb6c98e-6f29-44bc-a8ba-6a41686cf2f6.png">
<img width="490" alt="image" src="https://user-images.githubusercontent.com/29913902/172056918-1bb11905-6d90-46d4-8923-c0d81710abfa.png">
<img width="491" alt="image" src="https://user-images.githubusercontent.com/29913902/172056928-a17a6688-efec-4852-8481-dba739ad0da4.png">

## Code examples:
### Initialization of field
```xml
<field id="html" translate="label comment" type="textarea" sortOrder="10" showInDefault="1">
    <label>Html code</label>
    <frontend_model>Wscvua\AceEditor\Block\Adminhtml\System\Config\Field\HtmlCode</frontend_model>
</field>
<field id="js" translate="label comment" type="textarea" sortOrder="20" showInDefault="1">
    <label>JS code</label>
    <frontend_model>Wscvua\AceEditor\Block\Adminhtml\System\Config\Field\JsCode</frontend_model>
</field>
<field id="json" translate="label comment" type="textarea" sortOrder="30" showInDefault="1">
    <label>JSON code</label>
    <frontend_model>Wscvua\AceEditor\Block\Adminhtml\System\Config\Field\JsonCode</frontend_model>
</field>
<field id="css" translate="label comment" type="textarea" sortOrder="40" showInDefault="1">
    <label>Css code</label>
    <frontend_model>Wscvua\AceEditor\Block\Adminhtml\System\Config\Field\CssCode</frontend_model>
</field>
```
## Note
By default field height is 200px. For set some custom value you have to create new `virtualType` and set there custom height:  

**di.xml**
```xml
<virtualType name="Wscvua\AceEditor\Block\Adminhtml\System\Config\Field\CssCodeH100"
             type="Wscvua\AceEditor\Block\Adminhtml\System\Config\Field\CssCode">
    <arguments>
      <argument name="height" xsi:type="number">500</argument>
    </arguments>
</virtualType>
```  

**system.xml**
```xml
<field id="css" translate="label comment" type="textarea" sortOrder="40" showInDefault="1">
    <label>Css code</label>
    <frontend_model>Wscvua\AceEditor\Block\Adminhtml\System\Config\Field\CssCodeH100</frontend_model>
</field>
```

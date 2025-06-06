


/**
 * 
 * Users List
 *  
 **/ 


// https://www.mockaroo.com/


var inputElm = document.querySelector('input[name=users-list-tags]');

function tagTemplate(tagData){
    return `
        <tag title="${tagData.email}"
                contenteditable='false'
                spellcheck='false'
                tabIndex="-1"
                class="tagify__tag ${tagData.class ? tagData.class : ""}"
                ${this.getAttributes(tagData)}>
            <x title='' class='tagify__tag__removeBtn' role='button' aria-label='remove tag'></x>
            <div>
                <div class='tagify__tag__avatar-wrap'>
                    <img onerror="this.style.visibility='hidden'" src="${tagData.avatar}">
                </div>
                <span class='tagify__tag-text'>${tagData.name}</span>
            </div>
        </tag>
    `
}

function suggestionItemTemplate(tagData){
    return `
        <div ${this.getAttributes(tagData)}
            class='tagify__dropdown__item ${tagData.class ? tagData.class : ""}'
            tabindex="0"
            role="option">
            ${ tagData.avatar ? `
            <div class='tagify__dropdown__item__avatar-wrap'>
                <img onerror="this.style.visibility='hidden'" src="${tagData.avatar}">
            </div>` : ''
            }
            <strong>${tagData.name}</strong>
            <span>${tagData.email}</span>
        </div>
    `
}

// initialize Tagify on the above input node reference
var usrList = new Tagify(inputElm, {
    tagTextProp: 'name', // very important since a custom template is used with this property as text
    enforceWhitelist: true,
    skipInvalid: true, // do not remporarily add invalid tags
    dropdown: {
        closeOnSelect: false,
        enabled: 0,
        classname: 'users-list',
        searchKeys: ['name', 'email']  // very important to set by which keys to search for suggesttions when typing
    },
    templates: {
        tag: tagTemplate,
        dropdownItem: suggestionItemTemplate
    },
    whitelist: [
        {
            "value": 1,
            "name": "Justinian Hattersley",
            "avatar": "https://i.pravatar.cc/80?img=1",
            "email": "jhattersley0@ucsd.edu"
        },
        {
            "value": 2,
            "name": "Antons Esson",
            "avatar": "https://i.pravatar.cc/80?img=2",
            "email": "aesson1@ning.com"
        },
        {
            "value": 3,
            "name": "Ardeen Batisse",
            "avatar": "https://i.pravatar.cc/80?img=3",
            "email": "abatisse2@nih.gov"
        },
        {
            "value": 4,
            "name": "Graeme Yellowley",
            "avatar": "https://i.pravatar.cc/80?img=4",
            "email": "gyellowley3@behance.net"
        },
        {
            "value": 5,
            "name": "Dido Wilford",
            "avatar": "https://i.pravatar.cc/80?img=5",
            "email": "dwilford4@jugem.jp"
        },
        {
            "value": 6,
            "name": "Celesta Orwin",
            "avatar": "https://i.pravatar.cc/80?img=6",
            "email": "corwin5@meetup.com"
        },
        {
            "value": 7,
            "name": "Sally Main",
            "avatar": "https://i.pravatar.cc/80?img=7",
            "email": "smain6@techcrunch.com"
        },
        {
            "value": 8,
            "name": "Grethel Haysman",
            "avatar": "https://i.pravatar.cc/80?img=8",
            "email": "ghaysman7@mashable.com"
        },
        {
            "value": 9,
            "name": "Marvin Mandrake",
            "avatar": "https://i.pravatar.cc/80?img=9",
            "email": "mmandrake8@sourceforge.net"
        },
        {
            "value": 10,
            "name": "Corrie Tidey",
            "avatar": "https://i.pravatar.cc/80?img=10",
            "email": "ctidey9@youtube.com"
        },
        {
            "value": 11,
            "name": "foo",
            "avatar": "https://i.pravatar.cc/80?img=11",
            "email": "foo@bar.com"
        },
        {
            "value": 12,
            "name": "foo",
            "avatar": "https://i.pravatar.cc/80?img=12",
            "email": "foo.aaa@foo.com"
        },
    ]
})

usrList.on('dropdown:show dropdown:updated', onDropdownShow)
usrList.on('dropdown:select', onSelectSuggestion)

var addAllSuggestionsElm;

function onDropdownShow(e){
    var dropdownContentElm = e.detail.tagify.DOM.dropdown.content;

    if( usrList.suggestedListItems.length > 1 ){
        addAllSuggestionsElm = getAddAllSuggestionsElm();

        // insert "addAllSuggestionsElm" as the first element in the suggestions list
        dropdownContentElm.insertBefore(addAllSuggestionsElm, dropdownContentElm.firstChild)
    }
}

function onSelectSuggestion(e){
    if( e.detail.elm == addAllSuggestionsElm )
        usrList.dropdown.selectAll();
}

// create a "add all" custom suggestion element every time the dropdown changes
function getAddAllSuggestionsElm(){
    // suggestions items should be based on "dropdownItem" template
    return usrList.parseTemplate('dropdownItem', [{
            class: "addAll",
            name: "Add all",
            email: usrList.whitelist.reduce(function(remainingSuggestions, item){
                return usrList.isTagDuplicate(item.value) ? remainingSuggestions : remainingSuggestions + 1
            }, 0) + " Members"
        }]
      )
}





/**
 * 
 *  Single Value Select
 * 
 */

var input = document.querySelector('input[name=tags-select-mode]'),
    tagify = new Tagify(input, {
        enforceWhitelist: true,
        mode : "select",
        whitelist: ["first option", "second option", "third option"],
        blacklist: ['foo', 'bar'],
    })

// bind events
tagify.on('add', onAddTag)
tagify.DOM.input.addEventListener('focus', onSelectFocus)

function onAddTag(e){
    console.log(e.detail)
}

function onSelectFocus(e){
    console.log(e)
}
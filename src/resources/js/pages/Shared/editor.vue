<template>
    <div>
        <div class="_overflow _table_div blog_editor">
            <editor
                ref="editor"
                autofocus
                @save="onSave"
                :config="config"
                :initialized="onInitialized"
            />
        </div>
        <div class="d-flex align-items-center justify-content-center mt-4">
            <button class="btn btn-success" @click="save()">Create page  {{ name }}</button>
        </div>
    </div>
</template>

<script>
import transformer from '../../mixin/transformer';

import Header from '@editorjs/header';
import List from '@editorjs/list';
import CodeTool from '@editorjs/code'
import Paragraph from '@editorjs/paragraph'
import Embed from '@editorjs/embed'
import Table from '@editorjs/table'
import Checklist from '@editorjs/checklist'
import Marker from '@editorjs/marker'
import Warning from '@editorjs/warning'
import RawTool from '@editorjs/raw'
import Quote from '@editorjs/quote'
import InlineCode from '@editorjs/inline-code'
import Delimiter from '@editorjs/delimiter'
import SimpleImage from '@editorjs/simple-image'

export default {
    props: ['name', 'title', 'metaDescription'],
    mixins: [transformer],
    data() {
        return {
            config: {
                tools:{
                    header: {
                        class: Header,
                        config: {
                            levels: [2, 3, 4],
                            defaultLevel: 2,
                        }
                    },
                    list: {
                        class: List,
                        inlineToolbar: true,
                    },
                    code: {
                        class: CodeTool
                    },
                    paragraph: {
                        class: Paragraph,
                    },
                    embed: {
                        class: Embed,
                        config: {
                            services: {
                                youtube: true,
                                coub: true,
                                imgur: true
                            }
                        }
                    },
                    table: {
                        class: Table,
                        inlineToolbar: true,
                        config: {
                            rows: 2,
                            cols: 3,
                        },
                    },
                    checklist: {
                        class: Checklist,
                    },
                    Marker: {
                        class: Marker,
                        shortcut: 'CMD+SHIFT+M',
                    },
                    warning: {
                        class: Warning,
                        inlineToolbar: true,
                        shortcut: 'CMD+SHIFT+W',
                        config: {
                            titlePlaceholder: 'Title',
                            messagePlaceholder: 'Message',
                        },
                    },
                    raw: RawTool,
                    quote: {
                        class: Quote,
                        inlineToolbar: true,
                        shortcut: 'CMD+SHIFT+O',
                        config: {
                            quotePlaceholder: 'Enter a quote',
                            captionPlaceholder: 'Quote\'s author',
                        },
                    },
                    inlineCode: {
                        class: InlineCode,
                        shortcut: 'CMD+SHIFT+M',
                    },
                    delimiter: Delimiter,
                    image: SimpleImage,
                },
                onReady: () => {
                    //console.log('on ready')
                },
                onChange: (args) => {
                    //console.log('Now I know that Editor\'s content changed!')
                },
                data: {}
            },
            articleHTML: '',
            isCreating: false
        };
    },
    methods: {
        onInitialized (editor) {
            //
        },
        onSave(response){

        },
        async save(){

            const response = await this.$refs.editor.state.editor.save().then((res)=> {

                this.outputHtml(res.blocks);

                this.createPage({
                    title: this.title,
                    metaDescription: this.metaDescription,
                    jsonData: JSON.stringify(res),
                    name: this.name,
                    pageHtml: this.articleHTML,
                });

            });

        },
        outputHtml(articleObj){
            articleObj.map(obj => {
                switch (obj.type) {
                    case 'paragraph':
                        this.articleHTML += this.makeParagraph(obj);
                        break;
                    case 'image':
                        this.articleHTML += this.makeImage(obj);
                        break;
                    case 'header':
                        this.articleHTML += this.makeHeader(obj);
                        break;
                    case 'raw':
                        this.articleHTML += `<div class="ce-block">
                        <div class="ce-block__content">
                                <div class="ce-code">
                                    <code>${obj.data.html}</code>
                                </div>
                            </div>
                        </div>\n`;
                        break;
                    case 'code':
                        this.articleHTML += this.makeCode(obj);
                        break;
                    case 'list':
                        this.articleHTML += this.makeList(obj)
                        break;
                    case "quote":
                        this.articleHTML += this.makeQuote(obj)
                        break;
                    case "warning":
                        this.articleHTML += this.makeWarning(obj)
                        break;
                    case "checklist":
                        this.articleHTML += this.makeChecklist(obj)
                        break;
                    case "embed":
                        this.articleHTML += this.makeEmbed(obj)
                        break;
                    case 'delimeter':
                        this.articleHTML += this.makeDelimeter(obj);
                        break;
                    default:
                        return '';
                }
            });
        },

        createPage(data) {

            axios.post('/admin/frontend/page/create', data).then( (res) => {
                this.$message({
                    message: 'la page a ete creer avec success',
                    type: 'success'
                });
                this.articleHTML = '';
            });
        }
    },

    mounted() {
        //
    }
};
</script>

<style>
.blog_editor {
    width: 717px;
    margin-left: 160px;
    padding: 4px 7px;
    font-size: 14px;
    border: 1px solid #dcdee2;
    border-radius: 4px;
    color: #515a6e;
    background-color: #fff;
    background-image: none;
    z-index:  -1;
}
.blog_editor:hover {
    border: 1px solid #57a3f3;
}
.Header {
    border: #0b0b0b 2px solid;
}
</style>

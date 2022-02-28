<template>
    <div class="editor__menu d-flex" v-if="editor">
        <div class="text">
            <button
                @click="editor.chain().focus().toggleBold().run()"
                :class="{ 'is-active': editor.isActive('bold') }"
            >
                Жирный
            </button>
            <button
                @click="editor.chain().focus().toggleItalic().run()"
                :class="{ 'is-active': editor.isActive('italic') }"
            >
                Курсив
            </button>
        </div>

        <div class="font-size">
            <button
                @click="editor.chain().focus().toggleHeading({ level: 3 }).run()"
                :class="{ 'is-active': editor.isActive('heading', { level: 3 }) }"
            >
                В заголовок
            </button>

            <button @click="editor.chain().focus().setParagraph().run()" :class="{ 'is-active': editor.isActive('paragraph') }">
                В параграф
            </button>
        </div>

        <div class="ul">
            <button @click="editor.chain().focus().toggleBulletList().run()" :class="{ 'is-active': editor.isActive('bulletList') }">
                Маркированный
            </button>
            <button @click="editor.chain().focus().toggleOrderedList().run()" :class="{ 'is-active': editor.isActive('orderedList') }">
                Нумерованный
            </button>
        </div>

        <div class="break">
            <button @click="editor.chain().focus().setHorizontalRule().run()">
                Граница
            </button>
            <button @click="editor.chain().focus().setHardBreak().run()">
                Новая строка
            </button>
        </div>

        <div class="redo-undo">
            <button @click="editor.chain().focus().undo().run()">Отмена</button>
            <button @click="editor.chain().focus().redo().run()">Возврат</button>
        </div>
    </div>
    <editor-content :editor="editor" />
</template>

<script>
import { EditorContent, Editor } from "@tiptap/vue-3";
import StarterKit from "@tiptap/starter-kit";

export default {
    components: {
        EditorContent,
    },

    data() {
        return {
            editor: null,
        };
    },

    mounted() {
        this.editor = new Editor({
            extensions: [StarterKit],
            onUpdate: () => {
                this.$emit('update:modelValue', this.editor.getHTML())
            }
        });
    },

    props: {
        modelValue: {type: String, default: ''},
    },

    beforeUnmount() {
        this.editor.destroy();
    },
};
</script>

<style lang="scss">
.editor {
    &__menu {
        min-width: 250px;
        max-width: 800px;
        flex-wrap: wrap;
        button {
            font-size: 0.8em;
            margin-right: 4px;
            margin-bottom: 4px;
            padding: 2px 4px;
            color: var(--text-color);
            border: 1px solid var(--text-color);
            background-color: var(--background-color);
        }

        button:hover {
            color: var(--text-color);
            transition: 200ms ease all;
            background-color: var(--background-color);
            border: 1px solid var(--gray);
        }
    }
}



// Стиль в редакторе
.ProseMirror {
    overflow-y: scroll;
    min-height: 500px;
    max-height: 500px;
    min-width: 250px;
    max-width: 800px;
    border-radius: 4px 0 0 4px;
    border: 1px solid var(--dark);

    ul li {
        list-style-type: circle;
        margin-left: 70px;

    }

    ol li {
        list-style-type: decimal;
        margin-left: 70px;
    }

    p {
        text-indent: 30px;
    }
}
</style>
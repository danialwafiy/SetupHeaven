<template>
    <app-layout>
        <div class="pt-8 pb-24">
            <div class="text-4xl font-semibold text-indigo-500 mb-20">Got a new setup ?</div>
            <div class="flex">
                <div class="w-1/2 pr-4">
                    <textarea
                        class="mb-8 w-full text-2xl px-0 text-gray-500 border-0 focus:outline-none focus:ring-0 font-semibold"
                        placeholder="Give it a title ..."
                        v-model="title"
                    ></textarea>
                    <div
                        id="scrolling-container"
                        class="w-full mt-4"
                        style="height: 300px"
                    >
                        <div id="quill-container"></div>
                    </div>
                </div>
                <div class="w-1/2 pl-4">
                    <label
                        class="w-full flex flex-col items-center p-5 bg-white text-blue rounded-lg shadow-lg tracking-wide uppercase border border-blue cursor-pointer"
                    >
                        <svg
                            class="w-8 h-8"
                            fill="currentColor"
                            xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 20 20"
                        >
                            <path
                                d="M16.88 9.1A4 4 0 0 1 16 17H5a5 5 0 0 1-1-9.9V7a3 3 0 0 1 4.52-2.59A4.98 4.98 0 0 1 17 8c0 .38-.04.74-.12 1.1zM11 11h3l-4-4-4 4h3v3h2v-3z"
                            />
                        </svg>
                        <span class="mt-2 text-gray-500 font-semibold"
                            >Let's add some images</span
                        >
                        <input
                            type="file"
                            multiple
                            @change="onFileChange"
                            class="hidden"
                        />
                    </label>
                    <div class="grid grid-cols-4 gap-4 mt-5">
                        <div
                            class="relative"
                            v-for="(image, index) in images"
                            :key="index"
                        >
                            <img
                                :src="image"
                                class="rounded w-full h-full object-cover"
                            />
                            <a
                                href="#"
                                class="text-xl text-red-500 absolute bottom-0 right-0"
                                @click="removeFile(index)"
                                ><i class="lni lni-trash"></i
                            ></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="pt-5 pb-20 flex justify-end">
                <button
                    class="text-base font-lighter mr-2 bg-indigo-500 p-2 rounded text-white w-32 text-center flex justify-center items-center"
                    @click="preview()"
                >
                    <i class="lni lni-eye mr-2 text-2xl"></i>
                    Preview
                </button>
                <button
                    class="text-base font-lighter  bg-indigo-500 p-2 rounded text-white w-32 text-center flex justify-center items-center"
                >
                    <i class="lni lni-500px mr-2 text-2xl"></i>
                    Submit
                </button>
            </div>
            <div v-if="isPreview">
                <div class="text-4xl font-semibold text-indigo-500 mb-20">This is how it'll look.</div>
                <div class="flex">                   
                    <div class="w-2/5 pr-4">
                        <div class="text-4xl text-gray-700 font-semibold text-left">
                            {{ title }}
                        </div>
                        <div class="flex mt-2 items-center">
                            <div class="text-gray-400 text-xs">
                                <span class="font-bold"
                                    ><i class="lni lni-user mr-1"></i>
                                </span>
                                Danial Wafiy
                                <span class="font-bold ml-2"
                                    ><i class="lni lni-calendar mr-1"></i>
                                </span>
                                12/2/2020
                            </div>
                        </div>
                        <div class="mt-4 text-justify" v-html="detail"></div>
                    </div>
                    <div class="w-3/5 pl-4">
                        <img :src="images[0]" style="height:400px" class="w-full object-cover rounded">
                        <div class="grid grid-cols-5 gap-2 mt-3">
                            <img
                                :src="image"
                                class="rounded w-full h-full object-cover"
                                v-for="(image,index) in images.slice(1)" :key="index"
                            />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </app-layout>
</template>

<script>
import Quill from "quill";
import "quill/dist/quill.bubble.css";
import AppLayout from "@/Layouts/AppLayout";

export default {
    components: {
        AppLayout,
    },
    data() {
        return {
            quill: "",
            detail: "",
            images: [],
            isPreview: false,
        };
    },
    methods: {
        onFileChange(e) {
            var files = e.target.files;
            if (!files.length) return;
            this.createImage(files);
        },
        createImage(files) {
            var vm = this;
            for (var i = 0; i < files.length; i++) {
                var reader = new FileReader();
                reader.onload = function (event) {
                    const imageUrl = event.target.result;
                    vm.images.push(imageUrl);
                };
                reader.readAsDataURL(files[i]);
            }
        },
        removeFile(index) {
            this.images.splice(index, 1);
        },
        preview() {
            if(this.title = '' || this.images.length == 0){
                toast.fire({
                    icon: 'info',
                    title: 'Oops, missing something.',
                    timer: 3000,
                })
            }
            else{
                this.isPreview = true
                this.detail = this.quill.root.innerHTML;
            }
        },
    },
    mounted() {
        this.quill = new Quill("#quill-container", {
            modules: {
                toolbar: [
                    [{ header: [1, 2, false] }],
                    ["bold", "italic", "underline"],
                ],
            },
            scrollingContainer: "#scrolling-container",
            placeholder: "Tell us your story ...",
            theme: "bubble",
        });
    },
};
</script>

<style>
textarea:placeholder-shown {
    font-style: italic;
    padding-left: 14px;
    font-weight: 500;
}
#quill-container .ql-editor {
    font-size: 20px;
    color: #6b7280;
    padding: 0px;
}
</style>

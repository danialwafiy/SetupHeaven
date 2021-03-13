<template>
    <app-layout>
        <div class="pt-8 pb-24">
            <div class="flex flex-wrap">
                <div class="w-2/5 pr-4">
                    <div class="text-4xl text-gray-700 font-semibold text-left">
                        {{setup.title}}
                    </div>
                    <div class="flex mt-2 items-center">
                        <div class="text-gray-400 text-xs">
                            <span class="font-bold"
                                ><i class="lni lni-user mr-1"></i>
                            </span>
                            {{setup.user.name}}
                            <span class="font-bold ml-2"
                                ><i class="lni lni-calendar mr-1"></i>
                            </span>
                            {{setup.created_at}}
                        </div>
                    </div>
                    <div class="flex flex-wrap mt-4 text-justify">
                        {{setup.detail}}
                    </div>
                </div>
                <div class="w-3/5 pl-4">
                    <img
                        src="https://cdn11.bigcommerce.com/s-fz66rhptih/product_images/uploaded_images/lighting-pc-setup.jpg"
                        style="height:400px" class="w-full object-cover rounded"
                    />
                    <div class="grid grid-cols-5 gap-2 mt-3">
                        <img
                            src="https://cdn11.bigcommerce.com/s-fz66rhptih/product_images/uploaded_images/lighting-pc-setup.jpg"
                            class="rounded"
                        />
                        <img
                            src="https://cdn11.bigcommerce.com/s-fz66rhptih/product_images/uploaded_images/lighting-pc-setup.jpg"
                            class="rounded"
                        />
                        <img
                            src="https://cdn11.bigcommerce.com/s-fz66rhptih/product_images/uploaded_images/lighting-pc-setup.jpg"
                            class="rounded"
                        />
                        <img
                            src="https://cdn11.bigcommerce.com/s-fz66rhptih/product_images/uploaded_images/lighting-pc-setup.jpg"
                            class="rounded"
                        />
                        <img
                            src="https://cdn11.bigcommerce.com/s-fz66rhptih/product_images/uploaded_images/lighting-pc-setup.jpg"
                            class="rounded"
                        />
                        <img
                            src="https://cdn11.bigcommerce.com/s-fz66rhptih/product_images/uploaded_images/lighting-pc-setup.jpg"
                            class="rounded"
                        />
                        <img
                            src="https://cdn11.bigcommerce.com/s-fz66rhptih/product_images/uploaded_images/lighting-pc-setup.jpg"
                            class="rounded"
                        />
                    </div>
                </div>
            </div>
            <div class="flex flex-wrap mt-20">
                <div class="text-3xl text-indigo-500 font-semibold text-left">
                    Recomended Setups
                </div>
                <div class="mt-12 grid md:grid-cols-5 grid-cols-3 gap-4">
                    <router-link
                        :to="'/setup/' + recomendedSetup.title"
                        href="#"
                        class="shadow transition duration-500 relative p-0 transform hover:scale-105"
                        v-for="recomendedSetup in recomendedSetups"
                        :key="recomendedSetup.id"
                    >
                        <img
                            :src="recomendedSetup.url"
                            class="rounded h-full w-full object-cover"
                        />
                        <div
                            class="absolute bottom-0 right-0 py-1 px-3 bg-indigo-600 text-white font-light text-right"
                        >
                            <div class="text-xs">
                                <span class="font-semibold">by</span>
                                {{ recomendedSetup.author }}
                            </div>
                        </div>
                    </router-link>
                </div>
            </div>
        </div>
    </app-layout>
</template>

<script>
import AppLayout from "@/Layouts/AppLayout";
export default {
    props: {
        setup: "",
    },
    components: {
        AppLayout,
    },
    data() {
        return {
            recomendedSetups: [
                {
                    id: 1,
                    url:
                        "https://cdn11.bigcommerce.com/s-fz66rhptih/product_images/uploaded_images/lighting-pc-setup.jpg",
                    author: "Danial Wafiy",
                    date_created: "24/2/2021",
                },
                {
                    id: 2,
                    url:
                        "https://voltcave.com/wp-content/uploads/2019/03/chroman-setup.jpg",
                    author: "Faizul Faeez",
                    date_created: "24/2/2021",
                },
                {
                    id: 3,
                    url:
                        "https://www.aorus.com/upload/Admin/images/AC-20040213.jpg",
                    author: "Ahmad Hafizie",
                    date_created: "24/2/2021",
                },
                {
                    id: 4,
                    url: "https://i.redd.it/0ospw7f1shl41.jpg",
                    author: "Adam Irfan",
                    date_created: "24/2/2021",
                },
                {
                    id: 5,
                    url:
                        "https://voltcave.com/wp-content/uploads/2019/08/Arcwise-setup.jpg",
                    author: "Ramadhan Jamil",
                    date_created: "24/2/2021",
                },
            ],
        };
    },
    mounted(){
        this.setup
    }
};
</script>

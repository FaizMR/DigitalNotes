<script setup lang="ts">
import { Head } from '@inertiajs/vue3';
// import PlaceholderPattern from '@/components/PlaceholderPattern.vue';
import { LayoutGrid, List, Pencil, Star, Trash } from '@lucide/vue';
import { Button } from '@/components/ui/button';
import { Card, CardContent, CardDescription, CardFooter, CardHeader, CardTitle } from '@/components/ui/card';
import type { Notes } from '@/types/note';

defineOptions({
    layout: {
        breadcrumbs: [
            {
                title: 'All Notes',
                href: '/allNotes',
            },
        ],
    },
});

const props = defineProps<{
    notes: Notes;
}>();
// console.log(props.notes)
</script>

<template>

    <Head title="All Notes" />

    <div class="flex h-full flex-1 flex-col gap-4 overflow-x-auto rounded-xl p-4">
        <Card class="border-0">
            <CardHeader>
                <div class="flex justify-between">
                    <div>
                        <CardTitle>All Notes</CardTitle>
                        <!-- ... di isi dengan otomatis nantinya -->
                        <CardDescription>You have ... notes in total</CardDescription>
                    </div>
                    <div class="flex gap-2 p-2">
                        <Button variant="ghost" size="sm" class="cursor-pointer">
                            <LayoutGrid />
                        </Button>
                        <Button variant="ghost" size="sm" class="cursor-pointer">
                            <List />
                        </Button>
                    </div>
                </div>
            </CardHeader>
            <CardContent>
                <div class="grid grid-cols-3 gap-5">
                    <div v-for="data in props.notes" :key="data.id">
                        <Card class="group rounded-lg p-2">
                            <CardHeader class="p-2 pb-0">
                                <CardTitle class="flex justify-between items-center">
                                    <div
                                        class="bg-[#353437] px-3 py-1 rounded-lg uppercase text-[10px] tracking-wider font-medium">
                                        work
                                    </div>

                                    <div
                                        class="opacity-0 transition-opacity duration-300 group-hover:opacity-100 flex flex-row -mr-2">
                                        <Button variant="ghost" size="sm" class="h-8 w-8 p-0 cursor-pointer">
                                            <Pencil class="w-4 h-4" />
                                        </Button>
                                        <Button variant="ghost" size="sm" class="h-8 w-8 p-0 cursor-pointer">
                                            <Trash class="w-4 h-4" />
                                        </Button>
                                    </div>
                                </CardTitle>
                            </CardHeader>

                            <CardContent class="p-4 pt-3">
                                <h2 class="text-lg font-semibold mb-2 leading-tight">Rencana Proyek Web</h2>
                                <p class="text-xs text-[#b0b0b0] leading-relaxed">Review requirement dari stakeholder
                                    untuk phase 2. Fokus pada optimasi performa backend dan integrasi sistem pembayaran
                                    baru. Jangan lupa cek dokumentasi API terbaru dari tim infrastruktur sebelum
                                    deadline minggu depan.</p>
                            </CardContent>

                            <CardFooter class="p-4 pt-0">
                                <div class="flex justify-between w-full border-t border-[#353437] items-center pt-3">
                                    <div class="text-[10px] text-[#818284] uppercase font-medium">
                                        Updated 2h ago
                                    </div>
                                    <div class="text-[#818284]">
                                        <Button variant="ghost" size="sm" class="h-8 w-8 p-0 cursor-pointer">
                                            <Star class="w-4 h-4" />
                                        </Button>
                                    </div>
                                </div>
                            </CardFooter>
                        </Card>
                    </div>
                </div>
            </CardContent>
        </Card>
    </div>
</template>

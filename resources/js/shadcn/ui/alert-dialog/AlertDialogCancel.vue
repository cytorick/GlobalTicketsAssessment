<script setup>
import { computed } from "vue";
import { AlertDialogCancel } from "radix-vue";
import { cn } from "@/lib/utils";
import { buttonVariants } from "@/shadcn/ui/button";

const props = defineProps({
  asChild: { type: Boolean, required: false },
  as: { type: null, required: false },
  class: { type: null, required: false },
});

const delegatedProps = computed(() => {
  const { class: _, ...delegated } = props;

  return delegated;
});
</script>

<template>
  <AlertDialogCancel
    v-bind="delegatedProps"
  >
    <slot />
  </AlertDialogCancel>
</template>

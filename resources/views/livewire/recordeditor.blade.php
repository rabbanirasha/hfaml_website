<div wire:ignore.self class="modal fade" id="recordEditModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Record</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                @foreach ($fields as $field => $value)
                    @continue($field === $primaryKey)
                    <div class="mb-3">
                        <label class="form-label fw-semibold">{{ $field }}</label>

                        @if (in_array($field, $richFields, true))
                            <div wire:ignore wire:key="quill-{{ $recordId }}-{{ $field }}"
                                 x-data="{
                                    init() {
                                        const editor = new Quill(this.$refs.editorEl, { theme: 'snow' });
                                        editor.root.innerHTML = @js($value) ?? '';
                                        editor.on('text-change', () => {
                                            $wire.set('fields.{{ $field }}', editor.root.innerHTML);
                                        });
                                    }
                                 }">
                                <div x-ref="editorEl" style="min-height:150px;"></div>
                            </div>
                        @else
                            <input type="text" class="form-control" wire:model="fields.{{ $field }}">
                        @endif
                    </div>
                @endforeach
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button class="btn btn-primary" wire:click="save">Save</button>
            </div>
        </div>
    </div>
</div>
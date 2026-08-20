<div wire:ignore.self class="modal fade" id="recordEditModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{ $recordId === null ? 'Add Record' : 'Edit Record' }}</h5>
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
                        @elseif (($fieldTypes[$field] ?? null) === 'date')
                            <input type="date" class="form-control" wire:model="fields.{{ $field }}">
                        @elseif (str_ends_with($field, '_link'))
                            <input type="file" class="form-control" wire:model="imageUploads.{{ $field }}" accept="image/*">
                            <div wire:loading wire:target="imageUploads.{{ $field }}" class="text-muted small mt-1">Uploading...</div>
                            @if ($value)
                                <div class="mt-2 text-center"><img src="{{ asset($value) }}" style="max-height:100px;" alt=""></div>
                            @endif
                            @error('imageUploads.' . $field)
                                <div class="text-danger small mt-1">{{ $message }}</div>
                            @enderror                            
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
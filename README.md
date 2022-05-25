# Swow Extension API List

## swow
```C
SWOW_API zend_module_entry swow_module_entry;
SWOW_API swow_nts_globals_t swow_nts_globals;
SWOW_API zend_class_entry *swow_ce;
SWOW_API zend_class_entry *swow_module_ce;
```
## swow_buffer
```C
SWOW_API zend_class_entry *swow_buffer_ce;
SWOW_API zend_object_handlers swow_buffer_handlers;
SWOW_API zend_class_entry *swow_buffer_exception_ce;
SWOW_API const cat_buffer_allocator_t swow_buffer_allocator;
SWOW_API zend_string *swow_buffer_fetch_string(swow_buffer_t *sbuffer);
SWOW_API size_t swow_buffer_get_readable_space(swow_buffer_t *sbuffer, const char **ptr);
SWOW_API size_t swow_buffer_get_writable_space(swow_buffer_t *sbuffer, char **ptr);
SWOW_API void swow_buffer_virtual_read(swow_buffer_t *sbuffer, size_t length);
SWOW_API void swow_buffer_virtual_write(swow_buffer_t *sbuffer, size_t length);
SWOW_API void swow_buffer_virtual_write_no_seek(swow_buffer_t *sbuffer, size_t length);
SWOW_API void swow_buffer_cow(swow_buffer_t *sbuffer);
```
## swow_channel
```C
SWOW_API zend_class_entry *swow_channel_ce;
SWOW_API zend_object_handlers swow_channel_handlers;
SWOW_API zend_class_entry *swow_channel_selector_ce;
SWOW_API zend_object_handlers swow_channel_selector_handlers;
SWOW_API zend_class_entry *swow_channel_exception_ce;
SWOW_API zend_class_entry *swow_channel_selector_exception_ce;
```
## swow_closure
```C
SWOW_API CAT_GLOBALS_DECLARE(swow_closure);
SWOW_API SWOW_MAY_THROW HashTable *swow_serialize_user_anonymous_function(zend_function *function);
SWOW_API SWOW_MAY_THROW HashTable *swow_serialize_named_function(zend_function *function);
```
## swow_coroutine
```C
SWOW_API zend_class_entry *swow_coroutine_ce;
SWOW_API zend_object_handlers swow_coroutine_handlers;
SWOW_API zend_object_handlers swow_coroutine_main_handlers;
SWOW_API zend_class_entry *swow_coroutine_exception_ce;
SWOW_API CAT_GLOBALS_DECLARE(swow_coroutine);
SWOW_API swow_coroutine_t *swow_coroutine_create(zval *zcallable);
SWOW_API swow_coroutine_t *swow_coroutine_create_ex(zend_class_entry *ce, zval *zcallable, size_t stack_page_size, size_t c_stack_size);
SWOW_API void swow_coroutine_close(swow_coroutine_t *scoroutine);
SWOW_API void swow_coroutine_executor_save(swow_coroutine_executor_t *executor);
SWOW_API void swow_coroutine_executor_recover(swow_coroutine_executor_t *executor);
SWOW_API void swow_coroutine_switch_executor(swow_coroutine_t *current_scoroutine, swow_coroutine_t *target_scoroutine);
SWOW_API cat_bool_t swow_coroutine_resume(swow_coroutine_t *scoroutine, zval *zdata, zval *retval);
SWOW_API cat_bool_t swow_coroutine_yield(zval *zdata, zval *retval);
SWOW_API cat_bool_t swow_coroutine_is_available(const swow_coroutine_t *scoroutine);
SWOW_API cat_bool_t swow_coroutine_is_alive(const swow_coroutine_t *scoroutine);
SWOW_API cat_bool_t swow_coroutine_is_executing(const swow_coroutine_t *scoroutine);
SWOW_API swow_coroutine_t *swow_coroutine_get_from(const swow_coroutine_t *scoroutine);
SWOW_API swow_coroutine_t *swow_coroutine_get_previous(const swow_coroutine_t *scoroutine);
SWOW_API size_t swow_coroutine_set_default_stack_page_size(size_t size);
SWOW_API size_t swow_coroutine_set_default_c_stack_size(size_t size);
SWOW_API swow_coroutine_t *swow_coroutine_get_current(void);
SWOW_API swow_coroutine_t *swow_coroutine_get_main(void);
SWOW_API swow_coroutine_t *swow_coroutine_get_scheduler(void);
SWOW_API zend_string *swow_coroutine_get_executed_filename(const swow_coroutine_t *scoroutine, zend_long level);
SWOW_API uint32_t swow_coroutine_get_executed_lineno(const swow_coroutine_t *scoroutine, zend_long level);
SWOW_API zend_string *swow_coroutine_get_executed_function_name(const swow_coroutine_t *scoroutine, zend_long level);
SWOW_API HashTable *swow_coroutine_get_trace(const swow_coroutine_t *scoroutine, zend_long level, zend_long limit, zend_long options);
SWOW_API smart_str *swow_coroutine_get_trace_as_smart_str(swow_coroutine_t *scoroutine, smart_str *str, zend_long level, zend_long limit, zend_long options);
SWOW_API zend_string *swow_coroutine_get_trace_as_string(const swow_coroutine_t *scoroutine, zend_long level, zend_long limit, zend_long options);
SWOW_API HashTable *swow_coroutine_get_trace_as_list(const swow_coroutine_t *scoroutine, zend_long level, zend_long limit, zend_long options);
SWOW_API zend_long swow_coroutine_get_trace_depth(const swow_coroutine_t *scoroutine, zend_long limit);
SWOW_API HashTable *swow_coroutine_get_defined_vars(swow_coroutine_t *scoroutine, zend_ulong level);
SWOW_API cat_bool_t swow_coroutine_set_local_var(swow_coroutine_t *scoroutine, zend_string *name, zval *value, zend_long level, zend_bool force);
SWOW_API cat_bool_t swow_coroutine_eval(swow_coroutine_t *scoroutine, zend_string *string, zend_long level, zval *return_value);
SWOW_API cat_bool_t swow_coroutine_call(swow_coroutine_t *scoroutine, zval *zcallable, zend_long level, zval *return_value);
SWOW_API swow_coroutine_t *swow_coroutine_get_by_id(cat_coroutine_id_t id);
SWOW_API zval *swow_coroutine_get_zval_by_id(cat_coroutine_id_t id);
SWOW_API void swow_coroutine_dump(swow_coroutine_t *scoroutine);
SWOW_API void swow_coroutine_dump_current(void);
SWOW_API void swow_coroutine_dump_by_id(cat_coroutine_id_t id);
SWOW_API void swow_coroutine_dump_all(void);
SWOW_API void swow_coroutine_dump_all_to_file(const char *filename);
SWOW_API cat_bool_t swow_coroutine_throw(swow_coroutine_t *scoroutine, zend_object *exception, zval *retval);
SWOW_API cat_bool_t swow_coroutine_kill(swow_coroutine_t *scoroutine);
SWOW_API cat_bool_t swow_coroutine_kill_all(void);
```
## swow_debug
```C
SWOW_API CAT_GLOBALS_DECLARE(swow_debug);
SWOW_API zend_long swow_debug_backtrace_depth(zend_execute_data *call, zend_long limit);
SWOW_API zend_execute_data *swow_debug_backtrace_resolve(zend_execute_data *call, zend_long level);
SWOW_API zend_execute_data *swow_debug_backtrace_resolve_ex(zend_execute_data *call, zend_long level, zend_long limit, zend_long *depth);
SWOW_API smart_str *swow_debug_build_trace_as_smart_str(smart_str *str, HashTable *trace);
SWOW_API zend_string *swow_debug_build_trace_as_string(HashTable *trace);
SWOW_API HashTable *swow_debug_get_trace(zend_long options, zend_long limit);
SWOW_API smart_str *swow_debug_get_trace_as_smart_str(smart_str *str, zend_long options, zend_long limit);
SWOW_API zend_string *swow_debug_get_trace_as_string(zend_long options, zend_long limit);
SWOW_API HashTable *swow_debug_get_trace_as_list(zend_long options, zend_long limit);
```
## swow_defer
```C
SWOW_API zend_class_entry *swow_defer_ce;
SWOW_API zend_object_handlers swow_defer_handlers;
SWOW_API cat_bool_t swow_defer(zval *zcallable);
SWOW_API void swow_defer_do_tasks(swow_defer_t *sdefer);
SWOW_API void swow_defer_do_main_tasks(void);
```
## swow_errno
```C
SWOW_API zend_class_entry *swow_errno_ce;
```
## swow_event
```C
SWOW_API zend_class_entry *swow_event_ce;
SWOW_API zend_object_handlers swow_event_handlers;
```
## swow_exception
```C
SWOW_API zend_class_entry *swow_exception_ce;
SWOW_API zend_class_entry *swow_call_exception_ce;
SWOW_API swow_object_create_t swow_exception_create_object;
SWOW_API CAT_COLD void swow_exception_set_properties(zend_object *exception, const char *message, zend_long code);
SWOW_API CAT_COLD zend_object *swow_throw_exception(zend_class_entry *ce, zend_long code, const char *format, ...) ZEND_ATTRIBUTE_FORMAT(printf, 3, 4);
SWOW_API CAT_COLD zend_object *swow_throw_exception_with_last(zend_class_entry *ce);
SWOW_API CAT_COLD void swow_call_exception_set_return_value(zend_object *exception, zval *return_value);
SWOW_API const char *swow_strerrortype(int type);
```
## swow_hook
```C
SWOW_API cat_bool_t swow_hook_internal_function_handler(const char *name, size_t name_length, zif_handler handler);
SWOW_API cat_bool_t swow_hook_internal_function_handler_ex(const char *name, size_t name_length, zif_handler handler, zif_handler *original_handler);
SWOW_API cat_bool_t swow_hook_internal_function(const zend_function_entry *fe);
SWOW_API cat_bool_t swow_hook_internal_functions(const zend_function_entry *fes);
```
## swow_http
```C
SWOW_API zend_class_entry *swow_http_status_ce;
SWOW_API zend_class_entry *swow_http_parser_ce;
SWOW_API zend_object_handlers swow_http_parser_handlers;
SWOW_API zend_class_entry *swow_http_parser_exception_ce;
```
## swow_known_strings
```C
SWOW_API zend_string *SWOW_KNOWN_STRING(name);
```
## swow_log
```C
SWOW_API zend_class_entry *swow_log_ce;
```
## swow_signal
```C
SWOW_API zend_class_entry *swow_signal_ce;
SWOW_API zend_class_entry *swow_signal_exception_ce;
```
## swow_socket
```C
SWOW_API zend_class_entry *swow_socket_ce;
SWOW_API zend_object_handlers swow_socket_handlers;
SWOW_API zend_class_entry *swow_socket_exception_ce;
```
## swow_stream
```C
SWOW_API const php_stream_ops swow_stream_generic_socket_ops;
SWOW_API const php_stream_ops swow_stream_tcp_socket_ops;
SWOW_API const php_stream_ops swow_stream_udp_socket_ops;
SWOW_API const php_stream_ops swow_stream_pipe_socket_ops;
SWOW_API const php_stream_ops swow_stream_unix_socket_ops;
SWOW_API const php_stream_ops swow_stream_udg_socket_ops;
SWOW_API const php_stream_ops swow_stream_ssl_socket_ops;
```
## swow_sync
```C
SWOW_API zend_class_entry *swow_sync_wait_reference_ce;
SWOW_API zend_object_handlers swow_sync_wait_reference_handlers;
SWOW_API zend_class_entry *swow_sync_wait_group_ce;
SWOW_API zend_object_handlers swow_sync_wait_group_handlers;
SWOW_API zend_class_entry *swow_sync_exception_ce;
```
## swow_thannel
```C
SWOW_API zend_class_entry *swow_thannel_ce;
SWOW_API zend_object_handlers swow_thannel_handlers;
SWOW_API zend_class_entry *swow_thannel_exception_ce;
SWOW_API CAT_GLOBALS_DECLARE(swow_thannel)#define SWOW_THANNEL_G(x) CAT_GLOBALS_GET(swow_thannel, x)/* loader */zend_result swow_thannel_module_init(INIT_FUNC_ARGS);
```
## swow_thread
```C
SWOW_API zend_class_entry *swow_thread_ce;
SWOW_API zend_object_handlers swow_thread_handlers;
SWOW_API zend_class_entry *swow_thread_exception_ce;
SWOW_API CAT_GLOBALS_DECLARE(swow_thread);
```
## swow_tokenizer
```C
SWOW_API php_token_list_t *php_tokenize(zend_string *source, swow_closure_ast_callback_t ast_callback, void *ast_callback_context);
SWOW_API php_token_list_t *php_token_list_alloc(void);
SWOW_API void php_token_list_add(php_token_list_t *token_list, int token_type, const char *text, size_t text_length, int line);
SWOW_API void php_token_list_clear(php_token_list_t *token_list);
SWOW_API void php_token_list_free(php_token_list_t *token_list);
SWOW_API const char *php_token_get_name(const php_token_t *token);
SWOW_API const char *php_token_get_name_from_type(int type);
SWOW_API uint32_t swow_ast_children(zend_ast *node, zend_ast ***child);
SWOW_API void swow_ast_export_kinds_of_use(zend_ast *ast, smart_str *str, bool append_space);
```
## swow_util
```C
SWOW_API zend_class_entry *swow_util_handler_ce;
SWOW_API zend_object_handlers swow_util_handler_handlers;
SWOW_API swow_util_handler_t *swow_util_handler_create(zval *zcallable);
SWOW_API void swow_util_handler_push_back_to(swow_util_handler_t *handler, cat_queue_t *queue);
SWOW_API void swow_util_handler_remove(swow_util_handler_t *handler);
SWOW_API void swow_util_handlers_release(cat_queue_t *handlers);
```
## swow_watchdog
```C
SWOW_API zend_class_entry *swow_watchdog_ce;
SWOW_API zend_class_entry *swow_watchdog_exception_ce;
SWOW_API cat_bool_t swow_watchdog_run(cat_timeout_t quantum, cat_timeout_t threshold, zval *zalerter);
SWOW_API cat_bool_t swow_watchdog_stop(void);
SWOW_API void swow_watchdog_alert_standard(cat_watchdog_t *watchdog);
```
## swow_websocket
```C
SWOW_API zend_class_entry *swow_websocket_ce;
SWOW_API zend_class_entry *swow_websocket_opcode_ce;
SWOW_API zend_class_entry *swow_websocket_status_ce;
SWOW_API zend_class_entry *swow_websocket_frame_ce;
SWOW_API zend_object_handlers swow_websocket_frame_handlers;
```
## swow_wrapper
```C
SWOW_API zend_op_array *swow_compile_string(zend_string *source_string, const char *filename);
SWOW_API zend_op_array *swow_compile_string_ex(zend_string *source_string, const char *filename, zend_compile_position position);
SWOW_API zend_class_entry *swow_register_internal_class( const char *name, zend_class_entry *parent_ce, const zend_function_entry methods[], zend_object_handlers *handlers, const zend_object_handlers *parent_handlers, const cat_bool_t cloneable, const cat_bool_t serializable, const swow_object_create_t create_object, const swow_object_free_t free_object, const int offset);
SWOW_API zend_class_entry *swow_register_internal_interface( const char *name, const zend_function_entry methods[], swow_interface_gets_implemented_t interface_gets_implemented);
SWOW_API zend_object *swow_create_object_deny(zend_class_entry *ce);
SWOW_API zend_object *swow_custom_object_clone(zend_object *object);
SWOW_API zend_bool swow_fcall_storage_is_available(const swow_fcall_storage_t *fcall);
SWOW_API zend_bool swow_fcall_storage_create(swow_fcall_storage_t *fcall, zval *zcallable);
SWOW_API void swow_fcall_storage_release(swow_fcall_storage_t *fcall);
SWOW_API int swow_call_function_anyway(zend_fcall_info *fci, zend_fcall_info_cache *fci_cache);
SWOW_API void swow_var_dump_string(zend_string *string);
SWOW_API void swow_var_dump_string_ex(zend_string *string, int level);
SWOW_API void swow_var_dump_array(zend_array *array);
SWOW_API void swow_var_dump_array_ex(zend_array *array, int level);
SWOW_API void swow_var_dump_object(zend_object *object);
SWOW_API void swow_var_dump_object_ex(zend_object *object, int level);
SWOW_API void swow_output_globals_init(void);
SWOW_API void swow_output_globals_shutdown(void);
SWOW_API SWOW_MAY_THROW zend_string *swow_serialize(zval *z_data);
SWOW_API SWOW_MAY_THROW zend_string *swow_file_get_contents(zend_string *filename);
```
